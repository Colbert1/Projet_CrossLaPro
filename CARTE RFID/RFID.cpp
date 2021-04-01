#include <vcl.h>
#pragma hdrstop
#define WIN32
#include "RFID.h"
#include "uFCoder1x.h"
#include "iostream.h"
#pragma package(smart_init)
#pragma resource "*.dfm"

TCarteRFID *CarteRFID;

void TCarteRFID::ErrorCodes(void)
{
	//Toutes les erreurs possible dans la statusBar

	asErrorCode[0x00] = "Carte Active";
	asErrorCode[0x08] = "Pas de Carte ";
}

__fastcall TCarteRFID::TCarteRFID(TComponent *Owner)
	: TForm(Owner)
{
	boCONN = false;
	ErrorCodes();
}

void __fastcall TCarteRFID::SetStatusBar(TStatusBar *StatusBar, unsigned long ulResult)
{
	StatusBar->Panels->Items[1]->Text = "0x" + AnsiString().IntToHex(ulResult, 2); //Affiche sur la barre si la carte est active ou non
	StatusBar->Panels->Items[2]->Text = asErrorCode[ulResult];
}

void __fastcall TCarteRFID::Main()
{
	unsigned char ucCardType = 0,
				  ucCardUIDSize = 0,
				  aucCardUID[9];

	unsigned long ulReaderType = 0;
	DL_STATUS ulFResult;
	AnsiString sBuffer;

	ReaderStart = true;

	if (!boCONN) //On verifie que la carte est active
	{
		ulFResult = ReaderOpen(); //On active la lecture de la carte
		if (ulFResult == DL_OK)
		{
			boCONN = true;
			stbConnected->Panels->Items[0]->Text = "CONNECTED"; //On affiche sur la bar de statut si la carte est connecte
			SetStatusBar(stbConnected, ulFResult);
		}
		else
		{
			stbConnected->Panels->Items[0]->Text = "NOT CONNECTED"; //On affiche sur la bar de statut si la carte n'est pas connecte
			SetStatusBar(stbConnected, ulFResult);
		}
	}
	if (boCONN) //On verifie que la carte est active
	{

		ulFResult = GetReaderType(&ulReaderType);
		if (ulFResult == DL_OK)
		{
			ulFResult = GetDlogicCardType(&ucDLogicCardType);
			if (ulFResult == DL_OK)
			{
				ulFResult = GetCardIdEx(&ucCardType, &aucCardUID[0], &ucCardUIDSize);
				if (ulFResult == DL_OK)
				{
					for (unsigned char ucCounter = 0; ucCounter < ucCardUIDSize; ucCounter++)
					{ //On lit la carte
						sBuffer += AnsiString().IntToHex(aucCardUID[ucCounter], 2);
					}
				}
				Edit1->Text = "0x" + sBuffer; //On affiche son Code serie
				SetStatusBar(stbCardStatus, ulFResult);
				unsigned long sendLengh;
				UnicodeString str = Edit1->Text;			//
				wchar_t *text = str.c_str();				//
				char *convert = new char[str.Length() + 1]; //Systeme de conversion de Tchar en char
				wcstombs(convert, text, str.Length());		//
				convert[str.Length()] = 0x000;				//
				cardIdCache = convert;
				PORTS.envoie(convert, 10);
				delete convert;
			}
			else
			{
				SetStatusBar(stbCardStatus, ulFResult);
				Edit1->Clear(); //On clear l'affichage
			}
		}
		else
		{
			ReaderClose();
			boCONN = false;
			Edit1->Clear();
		}
	}
	ReaderStart = false;
}
void __fastcall TCarteRFID::mnuExitItemsClick(TObject *Sender)
{
	Close();
}
void __fastcall TCarteRFID::TimerTimer(TObject *Sender)
{
	if (FunctionStart)
		return;
	Main();
}
//---------------------------------------------------------------------------
void __fastcall TCarteRFID::FormCreate(TObject *Sender)
{
	GetLoadLibrary();
}
//---------------------------------------------------------------------------
void __fastcall TCarteRFID::Button2Click(TObject *Sender)
{
	int i;
	bool isreceiv = true;
	int res;
	PORTS.setEventListener(this);
	res = PORTS.createsocket(); //Permet de Lancer le serveur
	PORTS.setinterface();
	PORTS.ecoute();
	if (isreceiv == true)
	{
		Edit1->Visible = true;
		Label3->Visible = true;
		stbCardStatus->Visible = true;
	}
}
//---------------------------------------------------------------------------
void TCarteRFID::onClientConnected()
{
	if (cardIdCache.length() > 0)
		PORTS.envoie((char *)cardIdCache.c_str(), 10);
}

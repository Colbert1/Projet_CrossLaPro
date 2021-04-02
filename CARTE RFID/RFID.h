
#ifndef RFIDH
#define RFIDH

#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <Menus.hpp>
#include <ComCtrls.hpp>
#include <ExtCtrls.hpp>
#include "TCP.h"
#include <string.h>
#include <stdio.h>


class TCarteRFID : public TForm, TCPServeurEventListener
{

__published:	// Tous les outils de l'IHM
	TMainMenu *mnMeni;
	TMenuItem *mnuExitItems;
    TStatusBar *stbCardStatus;
        TStatusBar *stbConnected;
        TTimer *Timer;
	TLabel *linkLabel;
	TButton *Button2;
	TMainMenu *MainMenu1;
	TLabel *Label3;
	TEdit *Edit1;
    void __fastcall mnuExitItemsClick(TObject *Sender);
	void __fastcall TimerTimer(TObject *Sender);
	void __fastcall FormCreate(TObject *Sender);
	void __fastcall Button2Click(TObject *Sender);


private:
	TCPServeur PORTS;
	void Trame(char * buffer, int L);
    typedef unsigned char UCHAR;
	UCHAR ucDLogicCardType;
	UCHAR cardType;      //Type de la carte
	String asErrorCode[200];   //Code d'erreur
	bool boCONN;      //Permet de Savoir si la carte est connecté
	bool Read;  //on active la lecture
	bool Start;  //On lance la lecture
	void __fastcall Main();
	void __fastcall SetStatusBar(TStatusBar *StatusBar,unsigned long ulResult);
	void ErrorCodes(void);

	std::string cardIdCache;

protected:
    bool __fastcall Lecture(void)
    {
      return Read;
    }
    void __fastcall EnvoyerLecture(bool ValeurCarte)
	{
      Read=ValeurCarte;
    }

    bool __fastcall LancerLecture(void)
    {
      return Start;
    }
	void __fastcall ReturnLecture(bool ValeurCarte)
    {
      Start=ValeurCarte;
	}

public:
	__fastcall TCarteRFID(TComponent* Owner);
	virtual void onClientConnected();

__published:

    __property bool ReaderStart =
                    {
                      read=Lecture,
                      write=EnvoyerLecture
					};
    __property bool FunctionStart =
					{
					  read=LancerLecture,
                      write=ReturnLecture
					};
};
//---------------------------------------------------------------------------
extern PACKAGE TCarteRFID *CarteRFID;
//---------------------------------------------------------------------------
#endif

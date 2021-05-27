//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "Unit1.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
	: TForm(Owner)
{
}
void __fastcall TForm1::Button1Click(TObject *Sender)
{
	int portCOM;
	if(Edit1->Text == "1"){
		portCOM = 1;
	} else if(Edit1->Text == "2"){
		portCOM = 2;
	} else if(Edit1->Text == "3"){
		portCOM = 3;
	} else if(Edit1->Text == "4"){
		portCOM = 4;
	} else if(Edit1->Text == "5"){
		portCOM = 5;
	} else if(Edit1->Text == "6"){
		portCOM = 6;
	} else if(Edit1->Text == "7"){
		portCOM = 7;
	} else if(Edit1->Text == "8"){
		portCOM = 8;
	} else if(Edit1->Text == "9"){
		portCOM = 9;
	} else if(Edit1->Text == "10"){
		portCOM = 10;
	} else if(Edit1->Text == "11"){
		portCOM = 11;
	} else if(Edit1->Text == "12"){
		portCOM = 12;
	} else if(Edit1->Text == "13"){
		portCOM = 13;
	} else{
		portCOM = 999;
	}
	if(portCOM >= 1 && portCOM <= 13){
		bool reussiteOuvrirPort = RS232->ouvrirport(portCOM);
		if(reussiteOuvrirPort == false){
			Label2->Caption = "Ouverture échouée";
		}else{
			Label2->Caption = "Ouverture réussie";
		}
	} else{
		Label2->Caption = "Numéro de port incorrect";
    }
}
//---------------------------------------------------------------------------


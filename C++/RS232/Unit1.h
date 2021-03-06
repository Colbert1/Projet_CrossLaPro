//---------------------------------------------------------------------------

#ifndef Unit1H
#define Unit1H
//---------------------------------------------------------------------------
#include <System.Classes.hpp>
#include <Vcl.Controls.hpp>
#include <Vcl.StdCtrls.hpp>
#include <Vcl.Forms.hpp>
#include "Unit2.h"
#include "Unit3.h"
//---------------------------------------------------------------------------

typedef struct{
	char idDossard[6];
	int nbTours;
	char tempsTour[][12];
}coureur;

class TForm1 : public TForm
{
__published:	// Composants gérés par l'EDI
	TEdit *Edit1;
	TButton *Button1;
	TLabel *Label1;
	TLabel *Label2;
	TButton *Button2;
	TLabel *Label3;
	TLabel *Label4;
	TLabel *Label5;
	TLabel *Label6;
	TButton *Button3;
	TButton *Button4;
	TButton *Button5;
	TLabel *Label7;
	TLabel *Label8;
	TLabel *Label9;
	TLabel *Label10;
	TLabel *Label11;
	TLabel *Label12;
	TLabel *Label13;
	TLabel *Label14;
	TLabel *Label15;
	TLabel *Label16;
	void __fastcall Button1Click(TObject *Sender);
	void __fastcall Button2Click(TObject *Sender);
	void __fastcall Button3Click(TObject *Sender);
	void __fastcall Button4Click(TObject *Sender);
	void __fastcall Button5Click(TObject *Sender);
	void __fastcall Label13Click(TObject *Sender);
private:	// Déclarations utilisateur
	ThreadDetectionDossard *th;
	bool acquisitionStarted;
public:		// Déclarations utilisateur
	__fastcall TForm1(TComponent* Owner);
	liaison *RS232;;
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif

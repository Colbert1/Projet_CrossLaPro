//---------------------------------------------------------------------------

#include <System.hpp>
#pragma hdrstop

#include <stdio.h>
#include <conio.h>
#include <tchar.h>
#include <string>
#include <iostream>
#include "Unit3.h"
#include "Unit1.h"
#include "Unit2.h"
#pragma package(smart_init)
//---------------------------------------------------------------------------

//   Important : Les méthodes et les propriétés des objets de la VCL peuvent seulement être
//   utilisées dans une méthode appelée avec Synchronize, par exemple :
//
//      Synchronize(&UpdateCaption);
//
//   où UpdateCaption pourrait ressembler à :
//
//      void __fastcall ThreadDetectionDossard::UpdateCaption()
//      {
//        Form1->Caption = "Mis à jour dans un thread";
//      }
//---------------------------------------------------------------------------

__fastcall ThreadDetectionDossard::ThreadDetectionDossard(bool CreateSuspended)
	: TThread(CreateSuspended)
{
}
//---------------------------------------------------------------------------
void __fastcall ThreadDetectionDossard::Execute()
{
	//---- Placer le code du thread ici ----
	coureur Coureurs[500];
	int nbCoureurs = 0;
	while(!Terminated){
		int nb = 0, longueurBufferRecep = 23, n = 0, timeout = 0, numDossard;
		char bufferRecep[23], bufferRecepFinal[46], nombreDetection[2], idDossard[7], heureDetection[12];
		bool debutTrame, finTrame;
		bool dossardExist = false;
		debutTrame = false;
		finTrame = false;
		while(finTrame == false && timeout < 6){
			Sleep(500);
			Form1->RS232->recep(bufferRecep,longueurBufferRecep);
			for(int i = 0; i < longueurBufferRecep; i++){
				if(bufferRecep[i] == 0x02 && finTrame == false && debutTrame == false){
					debutTrame = true;
					bufferRecepFinal[nb] = bufferRecep[i];
					nb++;
				}else if(debutTrame == true && finTrame == false && bufferRecepFinal[nb-1] == 0x02 && bufferRecep[i] != 0x30){
					debutTrame = false;
					nb -= 1;
				}else if(debutTrame == true && finTrame == false && bufferRecepFinal[nb-1] == 0x02 && bufferRecep[i] == 0x30){
					bufferRecepFinal[nb] = bufferRecep[i];
					nb++;
				}else if(debutTrame == true && finTrame == false && bufferRecepFinal[nb-2] == 0x02 && bufferRecepFinal[nb-1] == 0x30 && bufferRecep[i] != 0x30){
					debutTrame = false;
					nb -= 2;
				}else if(debutTrame == true && finTrame == false && bufferRecepFinal[nb-2] == 0x02 && bufferRecepFinal[nb-1] == 0x30 && bufferRecep[i] == 0x30){
					bufferRecepFinal[nb] = bufferRecep[i];
					nb++;
				}else if(debutTrame == true && finTrame == false && bufferRecepFinal[nb-2] != 0x02 && bufferRecepFinal[nb-1] != 0x30 && bufferRecepFinal[nb-1] != 0x02 && bufferRecep[i] != 0x0D){
					bufferRecepFinal[nb] = bufferRecep[i];
					nb++;
				}else if(debutTrame == true && bufferRecep[i] == 0x0D){
					bufferRecepFinal[nb] = bufferRecep[i];
					nb++;
					finTrame = true;
				}else if(debutTrame == true && finTrame == false){
					if(bufferRecep[i] == 0x31 && bufferRecep[i-1] == 0x32 && nb == 13){
						bufferRecepFinal[nb] = bufferRecep[i];
						nb++;
					} else if(nb == 13 && bufferRecep[i] != 0x31 && bufferRecep[i-1] != 0x32){
						nb -= 13;
					} else {
						bufferRecepFinal[nb] = bufferRecep[i];
						nb++;
					}
				}
			}
            timeout++;
		}
		if(finTrame == true){
			snprintf(nombreDetection,2,"%c%c",bufferRecepFinal[8],bufferRecepFinal[9]);
			snprintf(idDossard,6,"%c%c%c%c%c%c",bufferRecepFinal[27],bufferRecepFinal[28],bufferRecepFinal[29],bufferRecepFinal[30],bufferRecepFinal[31],bufferRecepFinal[32]);
			snprintf(heureDetection,11,"%c%c%c%c%c%c%c%c%c%c%c",bufferRecepFinal[34],bufferRecepFinal[35],bufferRecepFinal[36],bufferRecepFinal[37],bufferRecepFinal[38],bufferRecepFinal[39],bufferRecepFinal[40],bufferRecepFinal[41],bufferRecepFinal[42],bufferRecepFinal[43],bufferRecepFinal[44]);

			if(nbCoureurs > 0){
				for(int i = 0; i < nbCoureurs; i++){
					if(strcmp(Coureurs[i].idDossard,idDossard) == 0 && strcmp(Coureurs[i].tempsTour[Coureurs[i].nbTours - 1],heureDetection) != 0){
						dossardExist = true;
						Coureurs[i].nbTours += 1;
						snprintf(Coureurs[i].tempsTour[Coureurs[i].nbTours - 1],11,"%c%c%c%c%c%c%c%c%c%c%c",heureDetection[0],heureDetection[1],heureDetection[2],heureDetection[3],heureDetection[4],heureDetection[5],heureDetection[6],heureDetection[7],heureDetection[8],heureDetection[9],heureDetection[10]);
						numDossard = i;
					} else if(strcmp(Coureurs[i].idDossard,idDossard) == 0 && strcmp(Coureurs[i].tempsTour[Coureurs[i].nbTours - 1],heureDetection) == 0){
						numDossard = i;
						dossardExist = true;
					}
				}
				if(dossardExist == false){
					numDossard = nbCoureurs;
					snprintf(Coureurs[nbCoureurs].idDossard,6,"%c%c%c%c%c%c",idDossard[0],idDossard[1],idDossard[2],idDossard[3],idDossard[4],idDossard[5]);
					Coureurs[nbCoureurs].nbTours = 1;
					snprintf(Coureurs[nbCoureurs].tempsTour[Coureurs[nbCoureurs].nbTours - 1],11,"%c%c%c%c%c%c%c%c%c%c%c",heureDetection[0],heureDetection[1],heureDetection[2],heureDetection[3],heureDetection[4],heureDetection[5],heureDetection[6],heureDetection[7],heureDetection[8],heureDetection[9],heureDetection[10]);
					nbCoureurs++;
				}
			} else {
				numDossard = 0;
				snprintf(Coureurs[nbCoureurs].idDossard,6,"%c%c%c%c%c%c",idDossard[0],idDossard[1],idDossard[2],idDossard[3],idDossard[4],idDossard[5]);
				Coureurs[nbCoureurs].nbTours = 1;
				snprintf(Coureurs[nbCoureurs].tempsTour[Coureurs[nbCoureurs].nbTours - 1],11,"%c%c%c%c%c%c%c%c%c%c%c",heureDetection[0],heureDetection[1],heureDetection[2],heureDetection[3],heureDetection[4],heureDetection[5],heureDetection[6],heureDetection[7],heureDetection[8],heureDetection[9],heureDetection[10]);
				nbCoureurs++;
			}

			char nbTour[2];
			sprintf(nbTour, "%d", Coureurs[numDossard].nbTours);
			std::string nbDetectionS(nbTour);
			Form1->Label12->Caption = nbDetectionS.c_str();
			std::string idDossardS(Coureurs[numDossard].idDossard);
			Form1->Label8->Caption = idDossardS.c_str();
			std::string heureDetectionS(Coureurs[numDossard].tempsTour[Coureurs[numDossard].nbTours - 1]);
			Form1->Label10->Caption = heureDetectionS.c_str();
			if(Coureurs[numDossard].nbTours > 1){
				std::string heureDetectionPrecS(Coureurs[numDossard].tempsTour[Coureurs[numDossard].nbTours - 2]);
				Form1->Label16->Caption = heureDetectionPrecS.c_str();
			} else {
				Form1->Label16->Caption = "Aucun temps";
			}
		}
	}
}
//---------------------------------------------------------------------------

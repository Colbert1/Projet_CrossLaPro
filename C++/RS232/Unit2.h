#ifndef Unit2H
#define Unit2H
#include <windows.h>

class liaison{
	char *buffer;
	char *port;
	HANDLE hcom;
	DCB dcb;

	public:
		liaison();
		bool ouvrirport(int portCOM); //On appel la fonction en bool�en pour qu'il y'ai que 2 choix possibles
		void ecrireport(char *buffer);
		void fermerport();
		void recep(char *buffer);
		void DMStoDD (char *times,char *lat, char *log,char *buf);
};

//---------------------------------------------------------------------------
#endif
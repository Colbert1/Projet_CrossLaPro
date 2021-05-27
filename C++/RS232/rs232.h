//---------------------------------------------------------------------------

#ifndef rs232H
#define rs232H

#include <Windows.h>
class rs232
{
private:

   HANDLE hcom;

public:
   bool Ouvrirport(int portCOM);
   bool ecrireport();  //createfile a besoin du chemin du fichier
   bool ecrireport(int n);
   bool lireport();






};
#endif

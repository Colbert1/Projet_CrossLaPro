#pragma hdrstop
#pragma argsused

#ifdef _WIN32
#include <tchar.h>
#else
  typedef char _TCHAR;
  #define _tmain main
#endif

#include "rs232.h"
#include <stdio.h>
#include <conio.h>
#include <time.h>


int timeout ( int seconds )
{
    clock_t endwait;
    endwait = clock () + seconds * CLOCKS_PER_SEC ;
    while (clock() < endwait) {}

    return  1;
}

int _tmain(int argc, _TCHAR* argv[]) 
{
	rs232 liaison;
    bool var=true;
	liaison.Ouvrirport();
	liaison.ecrireport();

	while(var==true)
	{

		liaison.lireport();

	}



	getch();

	return 0;
}

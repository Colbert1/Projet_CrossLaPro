//---------------------------------------------------------------------------

#pragma hdrstop

#include "rs232.h"
#include <windows.h>
#include <stdlib>
#include <stdio.h>
#include <iostream>


using namespace std;

bool rs232::Ouvrirport()
{
  this->hcom = CreateFileA("COM9",GENERIC_READ | GENERIC_WRITE,0,NULL,OPEN_EXISTING,FILE_FLAG_NO_BUFFERING,NULL);   //3e valeur = sécu,4e = ouvrir un port existant

  if(hcom == INVALID_HANDLE_VALUE)
  {
	  return false;

  }
  else
  {
	bool handleistested;
	DCB conf;

	handleistested = GetCommState(this->hcom,&conf);

	conf.BaudRate = CBR_9600;
	conf.StopBits = ONESTOPBIT;
	conf.Parity = NOPARITY;
	conf.ByteSize=8;
	SetCommState(this->hcom,&conf);
	COMMTIMEOUTS comm;
	comm.ReadIntervalTimeout = MAXDWORD;
	comm.ReadTotalTimeoutMultiplier=0;
	comm.ReadTotalTimeoutConstant=0;
	comm.WriteTotalTimeoutMultiplier=0;
	comm.WriteTotalTimeoutConstant=0;

	SetCommTimeouts(hcom,&comm);


    return true;

  }


}
bool rs232::ecrireport()
{

	bool okayornot = false;
	char buffer[50];
	unsigned long numberofbytewritten;


	gets(buffer);
	char * ptr = buffer;


	okayornot = WriteFile(this->hcom,ptr,strlen(buffer),&numberofbytewritten,NULL);

	if(okayornot == true)
	{
        return true;
	}
	else
	{
        return false;
	}


}

bool rs232::ecrireport(int n)
{
	bool okayornot = false;
	char* buffer = new char[n];
	unsigned long numberofbytewritten;


	gets(buffer);
	char * ptr = buffer;


	okayornot = WriteFile(this->hcom,ptr,n,&numberofbytewritten,NULL);

	if(okayornot == true)
	{
        return true;
	}
	else
	{
        return false;
	}
}

bool rs232::lireport()
{
	bool isread;
	char c;
	unsigned long recvLength;


	isread = ReadFile(this->hcom,&c,1,&recvLength,NULL);

	if(recvLength>0)
	{
       printf("%c", c);
	}


	if(isread==true)
	{
		return true;
	}
	else
	{
        return false;
    }
}
#pragma package(smart_init)

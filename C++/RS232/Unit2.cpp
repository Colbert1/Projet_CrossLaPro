#pragma hdrstop
#include "Unit2.h"
#include <string>
#pragma hdrstop
#pragma package(smart_init)
#include <iostream>
#include <stdio.h>
#include <sstream>




liaison::liaison(){
	this->buffer = new char[500];
}

bool liaison::ouvrirport(int portCOM){
	char COM[50];
	int length;
	if(portCOM > 9){
		length = 5;
	}else{
		length = 4;
	}
	snprintf(COM,100,"COM%d",portCOM);
	this->hcom = CreateFileA(COM,GENERIC_READ | GENERIC_WRITE,0,NULL,OPEN_EXISTING,FILE_FLAG_NO_BUFFERING,NULL);

	if(hcom == INVALID_HANDLE_VALUE){
		return false;
	}

	GetCommState(this->hcom,&this->dcb);   //On configure les param?tres du port s?rie

	this->dcb.BaudRate = CBR_115200;    //115200 de baud rate
	this->dcb.ByteSize = 8;             //8 de Data size
	this->dcb.Parity = NOPARITY;        //Pas de bit de parit?
	this->dcb.StopBits = ONESTOPBIT;    //Un bit de stop

	SetCommState(this->hcom,&this->dcb);


	COMMTIMEOUTS comm;
	comm.ReadIntervalTimeout = MAXDWORD;
	comm.ReadTotalTimeoutMultiplier=0;
	comm.ReadTotalTimeoutConstant=0;
	comm.WriteTotalTimeoutMultiplier=0;
	comm.WriteTotalTimeoutConstant=0;

	SetCommTimeouts(this->hcom,&comm);

	return true;
}

void liaison::ecrireport(char buffer[], int longueurBuffer){

	unsigned long sendLenght;
	WriteFile(this->hcom,buffer, 4,&sendLenght,NULL);
}

void liaison::fermerport(){
	CloseHandle(this->hcom);
}

void liaison::recep(char * buffer, int longueurBuffer){
	unsigned long sendLenght;
	ReadFile(this->hcom,buffer,longueurBuffer,&sendLenght,NULL);
	if(buffer){
		int a = 0;
	}
}







//---------------------------------------------------------------------------


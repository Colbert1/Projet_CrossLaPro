#pragma hdrstop
#include "TCP.h"
#pragma hdrstop
#include <winsock2.h>
#pragma package(smart_init)
#include <stdlib.h>
#include <stdio.h>
#include <algorithm>

HANDLE TCPServeur::mutex = CreateMutex(NULL, false, NULL);
std::vector<SOCKET> TCPServeur::connectedClients;
TCPServeurEventListener * TCPServeur::listener = NULL;

TCPServeur::TCPServeur(){

}

int TCPServeur::createsocket()     //Cette fonction va créer la socket
{

	WSADATA wsaData;
	WSAStartup(MAKEWORD(2,2), &wsaData);

	int sock = socket(AF_INET, SOCK_STREAM, 0);

	if(sock==INVALID_SOCKET)
	{

	   return -1;
	}
	else
	{
	   socketL = sock;
	   return sock;
	}
}

void TCPServeur::setinterface()
{
	SOCKADDR_IN sin = { 0 };
	const unsigned short port = 1050;          //On met le serveur en écoute sur le port 1050
	sin.sin_addr.s_addr = INADDR_ANY;
	sin.sin_family = AF_INET;
	sin.sin_port = htons(port);

	if(bind(socketL, (SOCKADDR *) &sin, sizeof sin) == SOCKET_ERROR)
	{
		perror("bind()");
		exit(errno);
	}
}

void TCPServeur::ecoute()      //Cette fonction va nous permettre d'accepter la connexion au serveur d'un client
{
	DWORD threadId;
	CreateThread(NULL, 0, &TCPServeur::ListeningThread, this, 0, &threadId);
}

/*
bool TCPServeur::receivsocket(char* buffer,int taille)
{

int recvLen = 0;

	 do
	 {
		 int recev_socket = ((recv(socket_to_send,buffer + recvLen,taille,0)));

		 if(recev_socket == SOCKET_ERROR)
		 {
			return false;
		 }
		 recvLen += recev_socket;

	 }while(recvLen < taille);

	 buffer[recvLen];
return true;
}
*/

bool TCPServeur::envoie(char *buffer,int taille) //On pourra envoyer dans un socket la valeur que l'on veut
{
	WaitForSingleObject(mutex, INFINITE);

	for(int i = 0; i < connectedClients.size(); i++)
	{
		int sendLen = 0;
        SOCKET socket_to_send = connectedClients[i];

		 do
		 {
			 int send_socket = ((send(socket_to_send,buffer + sendLen,taille,0)));

			 if(send_socket == SOCKET_ERROR)
			 {
				continue;
			 }
			 sendLen += send_socket;

		 }while(sendLen < taille);

	 }

	 ReleaseMutex(mutex);
return true;
}
//---------------------------------------------------------------------------


DWORD WINAPI TCPServeur::ListeningThread(LPVOID params)
{
	TCPServeur * serveur = (TCPServeur*)params;

	if(listen(serveur->socketL,5) == SOCKET_ERROR)
	{
		perror("listen()");
		exit(errno);
	}

	SOCKADDR_IN csin = {0};
	int sinsize = sizeof csin;

	while(true)
	{
		SOCKET socket_to_send = accept(serveur->socketL,(SOCKADDR *)&csin,&sinsize);

		if(socket_to_send == INVALID_SOCKET)
		{
			perror("accept()");
			break;
		}
		else
		{
			WaitForSingleObject(mutex, INFINITE);
			connectedClients.push_back(socket_to_send);
			ReleaseMutex(mutex);

			DWORD threadId;
			CreateThread(NULL, 0, &TCPServeur::ClientThread, &socket_to_send, 0, &threadId);

			if(listener != NULL)
			{
                listener->onClientConnected();
            }
		}
	}

	return 0;
}

DWORD WINAPI TCPServeur::ClientThread(LPVOID params)
{
	char buf;
	SOCKET socket_to_send = *((SOCKET*) params);

	while(recv(socket_to_send, &buf, 1, 0) > 0)
	{

	}

	WaitForSingleObject(mutex, INFINITE);
	std::vector<SOCKET>::iterator it = std::find(connectedClients.begin(), connectedClients.end(), socket_to_send);
	if(it != connectedClients.end())
	{
		connectedClients.erase(it);
    }
	ReleaseMutex(mutex);

    return 0;
}

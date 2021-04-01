//---------------------------------------------------------------------------
#include <winsock2.h>
#include <windows.h>
#include <vector>
#include <vcl.h>
#pragma comment(lib, "ws2_32.lib")
#ifndef Unit1H

class TCPServeurEventListener
{
public:
	virtual void onClientConnected() = 0;
};

class TCPServeur
{
	const char *hostname;
	SOCKET sock;
	struct hostent *hostinfo;
	char *buffer;
	int socketL;

	static DWORD WINAPI ListeningThread(LPVOID params);
	static DWORD WINAPI ClientThread(LPVOID params);
	static HANDLE mutex;
	static std::vector<SOCKET> connectedClients;
	static TCPServeurEventListener *listener;

public:
	TCPServeur();
	int createsocket();
	void setinterface();
	void ecoute();
	//bool receivsocket(char* buffer, int taille);
	bool envoie(char *buffer, int lenght);
	void setEventListener(TCPServeurEventListener *l)
	{
		listener = l;
	}
};
#define Unit1H
//---------------------------------------------------------------------------
#endif

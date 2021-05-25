#include "uFCoder1x.h"
#include "windows.h"

TReaderOpen ReaderOpen;
TReaderClose ReaderClose;
TGetReaderType GetReaderType;
TGetReaderSerialNumber GetReaderSerialNumber;
TReaderUISignal ReaderUISignal;
TBlockWrite BlockWrite;
TLinearRead LinearRead;
TLinearWrite LinearWrite;
TGetCardIdEx GetCardIdEx;
TGetDlogicCardType GetDlogicCardType;

void GetLoadLibrary()
{
	char* libPath;
	HINSTANCE handle = NULL;
	#ifdef WIN32
		libPath = ".\\ufr-lib\\windows\\x86\\uFCoder-x86.dll";
	#endif




	handle = LoadLibraryA(libPath);
	if (handle != NULL)
	 {
	   ReaderOpen = (TReaderOpen) GetProcAddress(handle,"ReaderOpen");
	   ReaderClose = (TReaderClose) GetProcAddress(handle,"ReaderClose");
	   GetReaderType = (TGetReaderType) GetProcAddress(handle,"GetReaderType");
	   GetReaderSerialNumber = (TGetReaderSerialNumber) GetProcAddress(handle,"GetReaderSerialNumber");
	   ReaderUISignal = (TReaderUISignal) GetProcAddress(handle,"ReaderUISignal");
	   BlockWrite = (TBlockWrite) GetProcAddress(handle,"BlockWrite");
	   LinearRead = (TLinearRead) GetProcAddress(handle,"LinearRead");
	   LinearWrite = (TLinearWrite) GetProcAddress(handle,"LinearWrite");
	   GetCardIdEx = (TGetCardIdEx) GetProcAddress(handle,"GetCardIdEx");
	   GetDlogicCardType = (TGetDlogicCardType) GetProcAddress(handle,"GetDlogicCardType");
	}
}


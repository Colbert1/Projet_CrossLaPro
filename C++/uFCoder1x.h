#ifndef uFCoder_H_
#define uFCoder_H_
#define WIN32

#ifdef WIN32

#ifdef DL_uFC_STATIC_LIB

#	define DL_uFC_API
//#	define DL_uFC_API __stdcall
//#	define DL_uFC_API _cdecl

#else
#	ifndef DL_uFC_EXPORTS
#		define DL_uFC_API __declspec(dllimport) __stdcall
#	else
#		define DL_uFC_API __declspec(dllexport) __stdcall
#	endif
#endif

#elif __linux__

#	define DL_uFC_API

#endif

// MIFARE CLASSIC type id's:
#define MIFARE_CLASSIC_1k   0x08
#define MF1ICS50            0x08
#define SLE66R35            0x88 // Infineon = Mifare Classic 1k
#define MIFARE_CLASSIC_4k   0x18
#define MF1ICS70            0x18
#define MIFARE_CLASSIC_MINI 0x09
#define MF1ICS20            0x09

//DLOGIC CARD TYPE
#define DL_MIFARE_ULTRALIGHT			0x01
#define DL_MIFARE_ULTRALIGHT_EV1_11		0x02
#define DL_MIFARE_ULTRALIGHT_EV1_21		0x03
#define DL_MIFARE_ULTRALIGHT_C			0x04
#define DL_NTAG_203				0x05
#define DL_NTAG_210				0x06
#define DL_NTAG_212				0x07
#define DL_NTAG_213				0x08
#define DL_NTAG_215				0x09
#define DL_NTAG_216				0x0A

#define DL_MIFARE_MINI				0x20
#define	DL_MIFARE_CLASSIC_1K			0x21
#define DL_MIFARE_CLASSIC_4K			0x22
#define DL_MIFARE_PLUS_S_2K			0x23
#define DL_MIFARE_PLUS_S_4K			0x24
#define DL_MIFARE_PLUS_X_2K			0x25
#define DL_MIFARE_PLUS_X_4K			0x26
#define DL_MIFARE_DESFIRE			0x27
#define DL_MIFARE_DESFIRE_EV1_2K		0x28
#define DL_MIFARE_DESFIRE_EV1_4K		0x29
#define DL_MIFARE_DESFIRE_EV1_8K		0x2A

// MIFARE CLASSIC Authentication Modes:
enum MIFARE_AUTHENTICATION
{
	MIFARE_AUTHENT1A = 0x60,
	MIFARE_AUTHENT1B = 0x61,
};

const int            DL_OK         = 0;
const unsigned char
					 FRES_OK_LIGHT = 4,
					 FRES_OK_SOUND = 0,
					 FERR_LIGHT    = 2,
					 FERR_SOUND    = 0;

const unsigned short
					 MAX_SECTORS_1k               = 16,
					 MAX_SECTORS_4k               = 40,
					 MAX_BYTES_NTAG_203           = 144,
					 MAX_BYTES_ULTRALIGHT         =  48,
					 MAX_BYTES_ULTRALIGHT_C       = 144,
					 MAX_BYTES_CLASSIC_1K         = 752,
					 MAX_BYTES_CLASSIC_4k         = 3440,
					 MAX_BYTES_TOTAL_ULTRALIGHT   = 64,
					 MAX_BYTES_TOTAL_ULTRALIGHT_C = 168,
					 MAX_BYTES_TOTAL_NTAG_203     = 168;


const unsigned char
					 MAX_BLOCK        = 16,
					 FORMAT_SIGN      = 0x0;

typedef unsigned long DL_STATUS;

// API Status Codes Type:
typedef enum UFCODER_ERROR_CODES
{
	UFR_OK = 0x00,
	UFR_COMMUNICATION_ERROR = 0x01,
	UFR_CHKSUM_ERROR = 0x02,
	UFR_READING_ERROR = 0x03,
	UFR_WRITING_ERROR = 0x04,
	UFR_BUFFER_OVERFLOW = 0x05,
	UFR_MAX_ADDRESS_EXCEEDED = 0x06,
	UFR_MAX_KEY_INDEX_EXCEEDED = 0x07,
	UFR_NO_CARD = 0x08,
	UFR_COMMAND_NOT_SUPPORTED = 0x09,
	UFR_FORBIDEN_DIRECT_WRITE_IN_SECTOR_TRAILER = 0x0A,
	UFR_ADDRESSED_BLOCK_IS_NOT_SECTOR_TRAILER = 0x0B,
	UFR_WRONG_ADDRESS_MODE = 0x0C,
	UFR_WRONG_ACCESS_BITS_VALUES = 0x0D,
	UFR_AUTH_ERROR = 0x0E,
	UFR_PARAMETERS_ERROR = 0x0F, // ToDo, tačka 5.
	UFR_MAX_SIZE_EXCEEDED = 0x10,

	UFR_WRITE_VERIFICATION_ERROR = 0x70,
	UFR_BUFFER_SIZE_EXCEEDED = 0x71,
	UFR_VALUE_BLOCK_INVALID = 0x72,
	UFR_VALUE_BLOCK_ADDR_INVALID = 0x73,
	UFR_VALUE_BLOCK_MANIPULATION_ERROR = 0x74,
	UFR_WRONG_UI_MODE = 0x75,
	UFR_KEYS_LOCKED = 0x76,
	UFR_KEYS_UNLOCKED = 0x77,
	UFR_WRONG_PASSWORD = 0x78,
	UFR_CAN_NOT_LOCK_DEVICE = 0x79,
	UFR_CAN_NOT_UNLOCK_DEVICE = 0x7A,
	UFR_DEVICE_EEPROM_BUSY = 0x7B,
	UFR_RTC_SET_ERROR = 0x7C,

	UFR_COMMUNICATION_BREAK = 0x50,
	UFR_NO_MEMORY_ERROR = 0x51,
	UFR_CAN_NOT_OPEN_READER = 0x52,
	UFR_READER_NOT_SUPPORTED = 0x53,
	UFR_READER_OPENING_ERROR = 0x54,
	UFR_READER_PORT_NOT_OPENED = 0x55,
	UFR_CANT_CLOSE_READER_PORT = 0x56,

	UFR_FT_STATUS_ERROR_1 = 0xA0,
	UFR_FT_STATUS_ERROR_2 = 0xA1,
	UFR_FT_STATUS_ERROR_3 = 0xA2,
	UFR_FT_STATUS_ERROR_4 = 0xA3,
	UFR_FT_STATUS_ERROR_5 = 0xA4,
	UFR_FT_STATUS_ERROR_6 = 0xA5,
	UFR_FT_STATUS_ERROR_7 = 0xA6,
	UFR_FT_STATUS_ERROR_8 = 0xA7,
	UFR_FT_STATUS_ERROR_9 = 0xA8,

	MAX_UFR_STATUS = 0xFFFFFFFF
} UFR_STATUS;




#ifdef __cplusplus
extern "C" {
#endif

typedef DL_uFC_API UFR_STATUS (*TReaderOpen)(void);

typedef DL_uFC_API UFR_STATUS (*TReaderClose)(void);

typedef DL_uFC_API UFR_STATUS (*TGetReaderType)(unsigned long *lpulReaderType);


typedef DL_uFC_API UFR_STATUS (*TGetReaderSerialNumber)(unsigned long *lpulSerialNumber);
typedef DL_uFC_API UFR_STATUS (*TReaderUISignal)(unsigned char light_signal_mode,unsigned char beep_signal_mode);


typedef DL_uFC_API UFR_STATUS (*TBlockWrite)(const unsigned char *data,
								 unsigned char block_address,
								 unsigned char auth_mode,
								 unsigned char key_index);

typedef DL_uFC_API UFR_STATUS (*TLinearRead)(unsigned char *aucData,
								 unsigned short usLinearAddress,
								 unsigned short usDataLength,
								 unsigned short *lpusBytesReturned,
								 unsigned char ucKeyMode,
								 unsigned char ucReaderKeyIndex);

typedef DL_uFC_API UFR_STATUS (*TLinearWrite)(const unsigned char *aucData,
								  unsigned short usLinearAddress,
								  unsigned short usDataLength,
								  unsigned short *lpusBytesWritten,
								  unsigned char ucKeyMode,
								  unsigned char ucReaderKeyIndex);

typedef DL_uFC_API UFR_STATUS (*TGetCardIdEx)(unsigned char *lpuSak,unsigned char *aucUid, unsigned char *lpucUidSize);


typedef DL_uFC_API UFR_STATUS (*TGetDlogicCardType)(unsigned char *lpucCardType);

typedef DL_uFC_API unsigned long (*TGetDllVersion)(void);


typedef char * chr_ptr;
DL_uFC_API chr_ptr UFR_Status2String(const UFR_STATUS status);
DL_uFC_API void error_get(void *out, int *size);


extern TReaderOpen ReaderOpen;
extern TReaderClose ReaderClose;
extern TGetReaderType GetReaderType;
extern TGetReaderSerialNumber GetReaderSerialNumber;
extern TReaderUISignal ReaderUISignal;
extern TBlockWrite BlockWrite;
extern TLinearRead LinearRead;
extern TLinearWrite LinearWrite;
extern TGetCardIdEx GetCardIdEx;
extern TGetDlogicCardType GetDlogicCardType;

void GetLoadLibrary();

#ifdef __cplusplus
}
#endif



#endif // uFCoder_H_




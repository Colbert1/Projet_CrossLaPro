object CarteRFID: TCarteRFID
  Left = 0
  Top = 0
  BorderIcons = [biSystemMenu, biMinimize]
  BorderStyle = bsSingle
  Caption = 'RFID'
  ClientHeight = 397
  ClientWidth = 276
  Color = clBtnFace
  Font.Charset = ANSI_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Verdana'
  Font.Style = []
  Menu = mnMeni
  OldCreateOrder = False
  Position = poDesigned
  OnCreate = FormCreate
  PixelsPerInch = 96
  TextHeight = 13
  object linkLabel: TLabel
    Left = 0
    Top = 434
    Width = 12
    Height = 13
    Cursor = crHandPoint
    Caption = '   '
    Font.Charset = ANSI_CHARSET
    Font.Color = clBlue
    Font.Height = -11
    Font.Name = 'Verdana'
    Font.Style = [fsUnderline]
    ParentFont = False
    Visible = False
  end
  object Label3: TLabel
    Left = 96
    Top = 145
    Width = 88
    Height = 13
    Caption = 'Serveur allum'#233
    Font.Charset = ANSI_CHARSET
    Font.Color = clLime
    Font.Height = -11
    Font.Name = 'Verdana'
    Font.Style = []
    ParentFont = False
    Visible = False
  end
  object stbCardStatus: TStatusBar
    Left = 0
    Top = 359
    Width = 276
    Height = 19
    Font.Charset = ANSI_CHARSET
    Font.Color = clBtnText
    Font.Height = -11
    Font.Name = 'Verdana'
    Font.Style = []
    Panels = <
      item
        Alignment = taCenter
        Text = 'Statut de la carte'
        Width = 120
      end
      item
        Alignment = taCenter
        Width = 50
      end
      item
        Alignment = taCenter
        Width = 50
      end>
    UseSystemFont = False
    Visible = False
  end
  object stbConnected: TStatusBar
    Left = 0
    Top = 378
    Width = 276
    Height = 19
    Font.Charset = ANSI_CHARSET
    Font.Color = clBtnText
    Font.Height = -11
    Font.Name = 'Verdana'
    Font.Style = []
    Panels = <
      item
        Alignment = taCenter
        Width = 120
      end
      item
        Alignment = taCenter
        Width = 50
      end
      item
        Alignment = taCenter
        Width = 50
      end>
    UseSystemFont = False
    Visible = False
  end
  object Button2: TButton
    Left = 48
    Top = 24
    Width = 169
    Height = 80
    Caption = 'Allumer serveur'
    TabOrder = 2
    OnClick = Button2Click
  end
  object Edit1: TEdit
    Left = 64
    Top = 118
    Width = 137
    Height = 21
    TabOrder = 3
    Visible = False
  end
  object mnMeni: TMainMenu
    Left = 400
    Top = 360
    object mnuExitItems: TMenuItem
      Caption = 'Exit'
      OnClick = mnuExitItemsClick
    end
  end
  object Timer: TTimer
    Interval = 500
    OnTimer = TimerTimer
    Left = 400
    Top = 320
  end
  object MainMenu1: TMainMenu
    Left = 440
    Top = 360
  end
end

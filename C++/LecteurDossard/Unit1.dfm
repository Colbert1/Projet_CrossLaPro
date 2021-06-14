object Form1: TForm1
  Left = 0
  Top = 0
  Caption = 'WinDAG 2021'
  ClientHeight = 311
  ClientWidth = 643
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 104
    Top = 115
    Width = 468
    Height = 13
    Caption = 
      'Entrez le num'#233'ro du port s'#233'rie que vous souhaitez ouvrir (ex : 1' +
      ' pour COM1, 2 pour COM2 etc...)'
  end
  object Label2: TLabel
    Left = 264
    Top = 163
    Width = 3
    Height = 13
  end
  object Label3: TLabel
    Left = 8
    Top = 8
    Width = 39
    Height = 13
    Caption = 'Heure : '
    Visible = False
  end
  object Label4: TLabel
    Left = 53
    Top = 8
    Width = 3
    Height = 13
  end
  object Label5: TLabel
    Left = 8
    Top = 27
    Width = 30
    Height = 13
    Caption = 'Date :'
    Visible = False
  end
  object Label6: TLabel
    Left = 44
    Top = 27
    Width = 3
    Height = 13
  end
  object Label7: TLabel
    Left = 189
    Top = 104
    Width = 116
    Height = 13
    Caption = 'Identifiant du dossard : '
    Visible = False
  end
  object Label8: TLabel
    Left = 325
    Top = 104
    Width = 3
    Height = 13
    Visible = False
  end
  object Label9: TLabel
    Left = 189
    Top = 139
    Width = 102
    Height = 13
    Caption = 'Heure de d'#233'tection : '
    Visible = False
  end
  object Label10: TLabel
    Left = 325
    Top = 139
    Width = 3
    Height = 13
    Visible = False
  end
  object Label11: TLabel
    Left = 189
    Top = 170
    Width = 32
    Height = 13
    Caption = 'Tour : '
    Visible = False
  end
  object Label12: TLabel
    Left = 325
    Top = 170
    Width = 3
    Height = 13
    Visible = False
  end
  object Label13: TLabel
    Left = 598
    Top = 296
    Width = 37
    Height = 13
    Caption = 'Label13'
  end
  object Label14: TLabel
    Left = 258
    Top = 72
    Width = 116
    Height = 13
    Caption = 'Dernier dossard d'#233'tect'#233
    Visible = False
  end
  object Label15: TLabel
    Left = 189
    Top = 200
    Width = 129
    Height = 13
    Caption = 'Heure du tour pr'#233'c'#233'dent : '
    Visible = False
  end
  object Label16: TLabel
    Left = 324
    Top = 200
    Width = 3
    Height = 13
  end
  object Edit1: TEdit
    Left = 216
    Top = 136
    Width = 121
    Height = 21
    TabOrder = 0
  end
  object Button1: TButton
    Left = 343
    Top = 134
    Width = 75
    Height = 25
    Caption = 'Ouvrir'
    TabOrder = 1
    OnClick = Button1Click
  end
  object Button2: TButton
    Left = 249
    Top = 134
    Width = 125
    Height = 25
    Caption = 'V'#233'rifier la connexion'
    TabOrder = 2
    Visible = False
    OnClick = Button2Click
  end
  object Button3: TButton
    Left = 8
    Top = 46
    Width = 75
    Height = 25
    Caption = 'Actualiser'
    TabOrder = 3
    Visible = False
    OnClick = Button3Click
  end
  object Button4: TButton
    Left = 249
    Top = 232
    Width = 125
    Height = 25
    Caption = 'D'#233'marrer l'#39'acquisition'
    TabOrder = 4
    Visible = False
    OnClick = Button4Click
  end
  object Button5: TButton
    Left = 249
    Top = 232
    Width = 125
    Height = 25
    Caption = 'Arreter l'#39'acquisition'
    TabOrder = 5
    Visible = False
    OnClick = Button5Click
  end
end

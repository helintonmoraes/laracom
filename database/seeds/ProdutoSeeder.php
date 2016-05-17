<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $produto = [
              
            0=>[ 'nome' => 'Celular Moto G2 - Mp90',
                 'descricao'=>'O G2 da ORRO é um excelente Smartphone 3G com Sistema operacional Android 4.4.2 Kit Kat original
                                sendo Quadriband (desbloqueado) e com Tela TouchScreen Capacitiva (sensível ao calor) de 5.0".
                                Com conexão Wi-Fi, GPS, duas câmeras com flash integrado e com função filmadora, além de
                                Bluetooth Estéreo. Reproduz arquivos em MP3/ MP4, rádio FM e expansão de memória de até 32GB',
                 'especificacao'=>'Especificações Técnicas
                                2 CHIPS (1 Chip SIM / 1 Chip Micro SIM) 3G WCDMA / 2G GSM Desbloqueado para OI / TIM / CLARO / VIVO
                                Banda: Quadriband EDGE/3G
                                Tela TouchScreen 5.0" Capacitiva 5 Pontos 854 x 480 pixels
                                Tela LCD SUPER AMOLED IPS
                                Permite uso de canetas touch para tela capacitiva
                                Sensor de Gravidade 3D
                                Função e-book: reconhece e lê arquivos de texto
                                Plataforma MTK6572 Dual-Core 1.3gHz: melhora o rendimento e o desempenho do aparelho
                                Plataforma Processador MT6572 DUAL CORE 1.3gHz
                                CPU Mali-400MP ARM
                                GPU OpenGL ES 2.0
                                Resolução Tela 854 X 480 Pixels
                                Sistema Operacional Android Versão 4.4.2 Kit Kat original com Play Store (Market)
                                Memória ROM de 2GB 
                                Memória RAM de 512MB
                                Conexão Wi-Fi 802.11b/g/n
                                Conexão WAP/MMS
                                GPS
                                Despertador
                                Calendário
                                Calculadora
                                Relógio mundial
                                Cronômetro', 
                 'resumo'=>'O G2 da ORRO é um excelente Smartphone 3G com Sistema operacional Android 4.4.2 Kit Kat original',
                 'imagem_1'=>'moto_g_2_1.jpg',
                 'imagem_2'=>'moto_g_2_2.jpg',
                 'imagem_3'=>'moto_g_2_3.jpg',
                 'imagem_4'=>'moto_g_2_4.jpg',
                 'imagem_5'=>'moto_g_2_5.jpg',
                 'imagem_6'=>'moto_g_2_6.jpg',
                 'qtd_avalicao'=>'10',
                 'preco_venda'=>'399.99',
                 'qtd_estoque'=>'10',
                 'lancamento'=>'true',
                 'destaque'=>'true',
                 'oferta'=>'true',
                 'id_categoria'=>'7',
                 'id_subcategoria'=>'22',
                 'id_marca'=>'1',
                'cont'=>'6'
                ],
                1=>[ 'nome' => 'Apple iPhone SE',
                 'descricao'=>'O Apple iPhone SE é um dos smartphones iOS mais avançados e completos que existem em circulação.
			Tem um display de 4 polegadas com uma resolução de 1136x640 pixel. As funcionalidades oferecidas
			pelo Apple iPhone SE são muitas e inovadoras. Começando pelo LTE 4G que permite a transferência
			de dados e excelente navegação na internet. E como não podia faltar Wi-fi e o GPS.Tem também leitor multimídia, videoconferência, e 				bluetooth. Enfatizamos a boa memória interna de 64 GB mas sem a possibilidade de expansão. ',
                 'especificacao'=>'Sistema Operacional iOS 9.3; Dimensões 123.8 x 58.6 x 7.6 mm; Peso 113 gramas;
   				Gsm Quad Band (850/900/1800/1900); Sim Card Nano; Chipset Apple A9 Twister;
   				Processador 1.8 GHz Dual Core; GPU PowerVR GT7600; RAM 2 GB; Memória 64GB', 
                 'resumo'=>'O Apple iPhone SE é um dos smartphones iOS mais avançados e completos que existem em circulação.',
                 'imagem_1'=>'iphone56_1_1.jpg',
                 'imagem_2'=>'iphone56_1_2.jpg',
                 'imagem_3'=>'iphone56_1_3.jpg',
                 'imagem_4'=>'iphone56_1_4.jpg',
                 'imagem_5'=>'iphone56_1_5.jpg',
                 'imagem_6'=>'iphone56_1_6.jpg',
                 'qtd_avalicao'=>'10',
                 'preco_venda'=>'699.99',
                 'qtd_estoque'=>'10',
                 'lancamento'=>'true',
                 'destaque'=>'true',
                 'oferta'=>'true',
                 'id_categoria'=>'7',
                 'id_subcategoria'=>'22',
                 'id_marca'=>'1',
                  'cont'=>'6'
                ],  
                
                2=>[ 
                'nome' => 'Microsoft Lumia 640 Dual Sim',
                'descricao'=>'O Smartphone Microsoft Lumia 640 proporciona uma experiência única para você em termos de tecnologia e qualidade. Com sistema operacional Windows Phone 8.1 e processador Quad Core, o Lumia 640 permite navegar muito mais rápido através das conexões Wi-Fi e 3G',
                'especificacao'=>'Smartphone Desbloqueado Microsoft Lumia 640 Dual SIM Preto, Windows Phone 8.1, Tela 5, TV Digital, Câmera 8MP, 8GB, Processador Quadcore 1,2GHz', 
                'resumo'=>'O Smartphone Microsoft Lumia 640 proporciona uma experiência única para você em termos de tecnologia e qualidade',
                'imagem_1'=>'lumia6401_1.jpg',
                'imagem_2'=>'lumia6401_2.jpg',
                'imagem_3'=>'lumia6401_3.jpg',
                'imagem_4'=>'lumia6401_4.jpg',
                'imagem_5'=>'lumia6401_5.jpg',
                'imagem_6'=>'lumia6401_6.jpg',
                'qtd_avalicao'=>'10',
                'preco_venda'=>'799.99',
                'qtd_estoque'=>'10',
                'lancamento'=>'true',
                'destaque'=>'true',
                'oferta'=>'true',
                'id_categoria'=>'7',
                'id_subcategoria'=>'22',
                'cont'=>'6',
                'id_marca'=>'1'],  
                
                3=>[ 
                'nome' => 'Samsung Galaxy Gran Prime',
                'descricao'=>'O Samsung Galaxy Gran Prime 3G Duos SM-G531H/DL processador de 1300 Mhz e 4-cores que possibilita rodar jogos e aplicativospesados, aparelho Dual Chip,Boa conectividade deste aparelho que inclui Bluetooth Versão4.1 com A2DP, Wi-Fi 802.11 b/g/n, mas não possui conexão NFC O Galaxy Gran Prime Duos é indicado para pessoas que estãosempre conectadas! Com conexão Wi-Fi e 3G, ele possui câmera traseira de 8megapixels e frontal de 5 megapixels. Assim, além de tirar ótimas fotos eselfies, você pode compartilhar nas redes sociais',
                'especificacao'=>'Flash Traseiro: Sim ;Flash Frontal: Não ;Possui TV?: Não;Marca: Samsung ;Tamanho da Tela: Tamanho da Tela: 5.0; Megapixels da Câmera Traseira: 8 MP; Capacidade de Chip: Dual Chip; Memória Expansível Até: 128gb; Memória Interna: 8GB; Memória RAM: 1GB; Versão: Android 5.1 ; Modelo: G531H; Resolução do Video: FHD (1920 x 1080) @30fps ; Processador: Quad Core 1.2 GHz.  ', 
                'resumo'=>'O Samsung Galaxy Gran Prime 3G Duos SM-G531H/DL processador de 1300 Mhz e 4-cores que possibilita rodar jogos e aplicativospesados.',
                'imagem_1'=>'galaxy_granp_g_1.jpg',
                'imagem_2'=>'galaxy_granp_g_2.jpg',
                'imagem_3'=>'galaxy_granp_g_3.jpg',
                'imagem_4'=>'galaxy_granp_g_4.jpg',
                'imagem_5'=>'galaxy_granp_g_5.jpg',
                'imagem_6'=>'galaxy_granp_g_6.jpg',
                'qtd_avalicao'=>'10',
                'preco_venda'=>'559.99',
                'qtd_estoque'=>'10',
                'lancamento'=>'true',
                'destaque'=>'true',
                'oferta'=>'true',
                'id_categoria'=>'7',
                'id_subcategoria'=>'22',
                'id_marca'=>'1',
                 'cont'=>'6'
                    ],  
                
            4=>[ 
	'nome' => 'Asus Zenfone Go Dual',

     	'descricao'=>'O Smartphone Asus Zenfone Go possui uma tela de 5 polegadas e moldura da tela mais estreita. Proporcionando um aproveitamento melhor do corpo do aparelho. Com acabamento Premium e design zen, ele chama a atenção.
A bateria está melhorada, com uma autonomia até 2x maior que os anteriores, ou seja, não se preocupe mais com aplicativos fechando ou travando. Registre todos os momentos com belas fotografias, a câmera do Asus Zenfone Go vem com 8MP',

    	'especificacao'=>'Android 5.1, Tela 5", Câm.8MP, Memória 16GB, Processador Quad-Core 1.3 GHz',
 
       'resumo'=>'O Smartphone Asus Zenfone Go possui uma tela de 5 polegadas e moldura da tela mais estreita.',

        'imagem_1'=>'zenfone_go1.jpg',

        'imagem_2'=>'zenfone_go2.jpg',

        'imagem_3'=>'zenfone_go3.jpg',

        'imagem_4'=>'zenfone_go4.jpg',

        'imagem_5'=>'zenfone_go5.jpg',
        'imagem_6'=>'zenfone_go6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'199.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'7',

        'id_subcategoria'=>'22',
        'cont'=>'6',
        'id_marca'=>'1'], 
              
         5=>[ 
	'nome' => 'Xperia M4 Aqua 16gb',

     	'descricao'=>'Os smartphones não param de surpreender! Depois de revolucionar a forma como as pessoas se comunicam, esses dispositivos vem ficando cada vez mais funcionais e dinâmicos',

    	'especificacao'=>'Android 5.0, Processador Octa-Core, Câmera 13MP, Tela 5',
 
       'resumo'=>'Smartphone Sony Xperia M4 Aqua Dual E2363 Desbloqueado Preto',

        'imagem_1'=>'xperia_m41.jpg',

        'imagem_2'=>'xperia_m42.jpg',

        'imagem_3'=>'xperia_m43.jpg',

        'imagem_4'=>'xperia_m44.jpg',

        'imagem_5'=>'xperia_m45.jpg',
        'imagem_6'=>'xperia_m46.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'699.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'false',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'7',

        'id_subcategoria'=>'22',

        'id_marca'=>'1',
'cont'=>'6'
   ],  
 6=>[ 
	'nome' => 'Blu Studio C Hd',

     	'descricao'=>'Smartphone CO BLU Estúdio Este sofisticado Mais, Tecido e 5.0 polegadas de com com flash de 8MP Câmera Traseira ea novidade flash da câmera de 5MP Frente COM',

    	'especificacao'=>'- Processador Mediatek 6580 + Quad Core 1.3GHz 1GB RAM UO Mais um multitarefas Desempenho líquidos, Taís na na internet Navegação, reproduzir música, transferência zumbido de Fazer e responder redes NAS Mensagens fy fazer Sociais Tudo Ao ligada MESMO ritmo!

			- Flash Da câmera de 8 megapixels LED automáticas COM fotos focagem Resolução COM 3265 x 2449 pixels UO 1080p HD vídeo a 30fps e câmera frontal para videoconferências Conta Uma com OU 5MP selfie',
 
       'resumo'=>'Smartphone CO BLU Estúdio Este sofisticado Mais, Tecido e 5.0 polegadas de com com flash de 8MP',

        'imagem_1'=>'blu_studio_1.jpg',

        'imagem_2'=>'blu_studio_2.jpg',

        'imagem_3'=>'blu_studio_3.jpg',

        'imagem_4'=>'blu_studio_4.jpg',

        'imagem_5'=>'blu_studio_5.jpg',
        'imagem_6'=>'blu_studio_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'499.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'false',

        'destaque'=>'true',

        'oferta'=>'false',

        'id_categoria'=>'7',

        'id_subcategoria'=>'22',

        'id_marca'=>'1',
'cont'=>'6'
   ],  
                
    7=>[ 
	'nome' => 'Blackberry Torch 9860',

     	'descricao'=>'O RIM Blackberry Torch 9860 é um celular Touchscreen de bom nível, capaz de satisfazer até o mais exigente dos usuários. Tem uma grande tela Touchscreen de 3.7 polegadas com uma resolução de 800x480 pixels. Sobre as características deste RIM Blackberry Torch 9860 na verdade não falta nada. Começando pelo HSDPA e HSUPA que permite a transferência de dados e excelente navegação na internet, além de conectividade Wi-fi e GPS. Tem também leitor multimídia, bluetooth e memória expansível.
Ótima a câmera de 5 megapixels que permite ao RIM Blackberry Torch 9860 tirar fotos com uma resolução de 2592x1944 pixels e gravar vídeos em alta definição (HD) com uma resolução de 1280x720 pixels. Muito fino, 11.5 milímetros, o que torna o RIM Blackberry Torch 9860 realmente interessante',

    	'especificacao'=>'768 MB de memória RAM (EXTREMAMENTE RÁPIDO)
eMMC de 4 GB (até 2 GB reservados para o armazenamento de aplicativos e do sistema operacional)
Memória expansível para até 32 GB com um cartão microSD 

Processador: QC 8655 1.2 GHz
Sensores: acelerômetro, bússola digital

Bateria de íons de lítio recarregável/removível de 1230 mAh
Tempo de uso: até 4,7 horas (GSM®) ou até 6,8 horas (UMTS®)1',
 
       'resumo'=>'O RIM Blackberry Torch 9860 é um celular Touchscreen de bom nível',

        'imagem_1'=>'blacberry_9860_1.jpg',

        'imagem_2'=>'blacberry_9860_2.jpg',

        'imagem_3'=>'blacberry_9860_3.jpg',

        'imagem_4'=>'blacberry_9860_4.jpg',

        'imagem_5'=>'blacberry_9860_5.jpg',
        'imagem_6'=>'blacberry_9860_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'899.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'false',

        'oferta'=>'true',

        'id_categoria'=>'7',

        'id_subcategoria'=>'22',
        'cont'=>'6',
        'id_marca'=>'1'

   ], 
    8=>[ 
	'nome' => 'Galaxy Tab A Sm-p555m',

     	'descricao'=>'O Tablet Galaxy Tab A da Samsung possui conexão 4G e Wi-Fi, uma ótima opção para quem deseja estar sempre conectado. Acompanha caneta S Pen para você desenhar e escrever com a facilidade de um lápis. E mais: tela de 9,7" com resolução HD, câmera frontal para as melhores selfies, Android 5.0 e processador Quad Core de 1.2GHz para navegar na internet, acessar as redes sociais e assistir filmes e vídeos com alto desempenho.',

    	'especificacao'=>'Modelo: SM-P555MZAAZTO;Galaxy Tab A;Cor: Cinza ou Branco;4G;Caneta S Pen;Sistema Operacional: Android 5.0.2, Lollipop;Processador: Quad Core de 1.2Ghz',
 
       'resumo'=>'O Tablet Galaxy Tab A da Samsung possui conexão 4G e Wi-Fi, uma ótima opção para quem deseja estar sempre conectado.',

        'imagem_1'=>'gal_tab_a_1.jpg',

        'imagem_2'=>'gal_tab_a_2.jpg',

        'imagem_3'=>'gal_tab_a_3.jpg',

        'imagem_4'=>'gal_tab_a_4.jpg',

        'imagem_5'=>'gal_tab_a_5.jpg',
        'imagem_6'=>'gal_tab_a_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'399.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'7',

        'id_subcategoria'=>'21',
'cont'=>'6',
        'id_marca'=>'1'

   ],  
                
 9=>[ 
	'nome' => 'Tablet Cce Atom',

     	'descricao'=>'Aplicativos incríveis.Com o Windows 8, você pode baixar diversos aplicativos na Windows Store e na loja exclusiva CCE.Seu notebook vira uma central de trabalho e diversãoO notebook F10-30 é notebook e tablet. Assim você compartilha o melhor das duas tecnologias, para trabalho e lazer.',

    	'especificacao'=>'MARCA: CCE
MODELO: F10 30  
PROCESSADOR: ATOM Z3735G 
MEMÓRIA: 1GB   
MEMÓRIA FLASH: 16GB
PORTAS: MICRO HDMI - 1 ENTRADA USB - LEITOR DE CARTÃO(MICRO SD)
CÂMERA: WEBCAM EMBUTIDA  
SISTEMA OPERACIONAL:  WINDOWS 8.1 ',
 
       'resumo'=>'Com apenas 384 gramas e suporte para modem 3G, o tablet te conecta de qualquer lugar, com facilidade e rapidez.',

        'imagem_1'=>'cce_atom_1.jpg',

        'imagem_2'=>'cce_atom_2.jpg',

        'imagem_3'=>'cce_atom_3.jpg',

        'imagem_4'=>'cce_atom_4.jpg',

        'imagem_5'=>'cce_atom_5.jpg',
        'imagem_6'=>'cce_atom_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'499.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'7',

        'id_subcategoria'=>'21',
'cont'=>'6',
        'id_marca'=>'1'

   ],  
          
10=>[ 
	'nome' => 'Geladeira Consul Crd36gb',

     	'descricao'=>'Tudo organizado
A Geladeira Duplex Consul com capacidade para 334 litros é ideal para você que quer deixar a sua cozinha mais organizada. Com congelador e refrigerador separados, gaveta multiuso e compartimentos removíveis, ela vai facilitar o seu dia a dia.

Superfreezer
O freezer da Geladeira Duplex é perfeito para você guardar seus alimentos congelados, sorvetes, gelo e o que mais desejar. Ele conta com 76 litros de capacidade, prateleira na porta e forminha de gelo.

Gaveta multiuso
Nela cabe tudo e mais um pouco. Ideal para frutas, legumes e verduras, fica na parte de baixo da geladeira e é transparente, o que facilita a visualização sem precisar abrir a gaveta.

Cada coisa em seu lugar
A porta da geladeira tem 3 prateleiras, para deixar tudo mais organizado. A de baixo é perfeita para garrafas, a do meio vem com porta-ovos e a de cima é porta-latas para deixar as suas bebidas sempre organizadas.

Controle de temperatura
Com o controle é possível selecionar as posições de temperatura que variam entre: Mínimo para os dias frios ou pouca abertura da porta; Médio, para condições normais de uso; Máximo, para dias quentes e com muita abertura de porta e Super Frio para o resfriamento rápido.',

    	'especificacao'=>'LARGURA 60,3cm, ALTURA 166,9cm, PROFUNDIDADE 63,4cm, PESO 58kg, TIPO Geladeira / Refrigerador - Duplex, COR Branco, GARANTIA 12 meses',
 
       'resumo'=>'A Geladeira Duplex Consul com capacidade para 334 litros é ideal para você que quer deixar a sua cozinha mais organizada. Com congelador e refrigerador separados, gaveta multiuso e compartimentos removíveis, ela vai facilitar o seu dia a dia',

        'imagem_1'=>'gel_duplex_consul_1.jpg',

        'imagem_2'=>'gel_duplex_consul_2.jpg',

        'imagem_3'=>'gel_duplex_consul_3.jpg',

        'imagem_4'=>'gel_duplex_consul_4.jpg',

        'imagem_5'=>'gel_duplex_consul_5.jpg',
        'imagem_6'=>'gel_duplex_consul_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'699.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'1',

        'id_subcategoria'=>'8',
'cont'=>'6',
        'id_marca'=>'1'

   ],  
 11=>[ 
	'nome' => 'Geladeira Brastemp Clean',

     	'descricao'=>'A Geladeira Brastemp Inox Clean possui 352 litros etem sistema Frost Free, ou seja, você não precisa descongelá-la nunca. Contatambém com compartimentos internos especiais e controle eletrônico detemperatura externa, além de ser na cor platinum que deixa sua cozinha aindamais moderna e bonita! ',

    	'especificacao'=>'Controle de temperatura interno, Controle de temperatura externo, De 301 a 400 Litros, Sistema de refrigeração:Frost Free, Consumo aproximado de energia: 46,4, Material:Evox,Pés: Fixo, Potência: 110 W ',
 
       'resumo'=>'Deixe suacozinha mais completa com a Geladeira BrastempInox Clean! ',

        'imagem_1'=>'brastemp_clean_1.jpg',

        'imagem_2'=>'brastemp_clean_2.jpg',

        'imagem_3'=>'brastemp_clean_3.jpg',

        'imagem_4'=>'brastemp_clean_4.jpg',

        'imagem_5'=>'brastemp_clean_5.jpg',
        'imagem_6'=>'brastemp_clean_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'699.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'1',

        'id_subcategoria'=>'8',
'cont'=>'6',
        'id_marca'=>'1'

   ], 
            
 12=>[ 
	'nome' => 'Sony Playstation 2 Slim',

     	'descricao'=>'A grande vencedora da sexta geração de aparelhos foi a Sony. O console foi o responsável por isso e, com seu hardware avançado, colocou a empresa japonesa definitivamente na história dos jogos eletrônicos.

Seu catálogo de games é fortíssimo, com mais de 1.800 títulos, muitos deles exclusivos. Além de formarem um retrato importante do cenário de jogos de uma época, mostram também toda a força de uma plataformaque foi abraçada pelos estúdios.',

    	'especificacao'=>'Especificações 
- Requisitos de alimentação CA 100-240 V 50/60 Hz 
- Consumo de energia (aprox.) 35 W 
- Dimensões da unidade (aprox.) 230 × 28 × 152 mm (LxAxP) 
- Peso da unidade (aprox.) 720 g 
- Formato de sinal NTSC 
- Temperatura de operação 5°C a 35°C 

Entradas/saídas na parte dianteira da unidade 
- Porta do controlador (2). 
- Compartimento para o cartão de memória (Memory Card) (2). 
- Conector USB (2). 

Entradas/saídas na parte traseira da unidade 
- Conector de rede (Network). 
- Conector de alimentação (~AC IN). 
- Conector de saída de áudio e vídeo (AV Multi OUT). 
- Conector de saída digital (Digital Out (Optical)). 

Mídias compatíveis 
- DVD DVD-ROM no formato do PlayStation 2. 
- DVD-ROM (vídeo DVD). 
- DVD+R / DVD+RW. 
- DVD-R / DVD-RW (modo Vídeo/modo VR). 
- CD CD-ROM no formato do PlayStation 2. 
- CD-ROM no formato do PlayStation. 
- CD-DA (CD de áudio).',
 
       'resumo'=>'Divirta-se com o PlayStation 2Curta o videogame da Sony',

        'imagem_1'=>'play_2_1.jpg',

        'imagem_2'=>'play_2_2.jpg',

        'imagem_3'=>'play_2_3.jpg',

        'imagem_4'=>'play_2_4.jpg',

        'imagem_5'=>'play_2_5.jpg',
        'imagem_6'=>'play_2_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'599.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'2',

        'id_subcategoria'=>'10',
'cont'=>'6',
        'id_marca'=>'1'

   ], 
 
 13=>[ 
	'nome' => 'Sega Dreamcast',

     	'descricao'=>'O Dreamcast (Os codinomes foram "Blackbelt", "Dural" e "Katana" durante o seu desenvolvimento) foi o último console de videogames da Sega e o sucessor do Sega Saturn',

    	'especificacao'=>'
    64 bits
    8MB de memória SDR
    Capacidade de 17 milhões de polígonos/segundo(hexagonais), em média 145 milhões de triângulos/segundo.
    Com suporte a diversos efeitos gráficos como trilinear filtering, gouraud shading, z-buffering, anti-aliasing and bump mapping.
    Taxa de preenchimento de pixels/texels: 200Mpixel* (na gpu do Dreamcast,para descobrir o fillrate efetivo total multiplica-se o fillrate base pela taxa de overdraw,que varia de 1.5 á 4.75 nos jogos do Dreamcast;exemplo 200 x 4.75= 475Mpixel)
',
 
       'resumo'=>'O Dreamcast foi o último console de videogames da Sega e o sucessor do Sega Saturn',

        'imagem_1'=>'dreamcast_1.jpg',

        'imagem_2'=>'dreamcast_2.jpg',

        'imagem_3'=>'dreamcast_3.jpg',

        'imagem_4'=>'dreamcast_4.jpg',

        'imagem_5'=>'dreamcast_5.jpg',
        'imagem_6'=>'dreamcast_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'699.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'2',

        'id_subcategoria'=>'10',
'cont'=>'6',
        'id_marca'=>'1'

   ],  
14=>[ 
	'nome' => 'Furadeira 400w Brocks',

     	'descricao'=>'A Brocks traz a você agora uma ferramenta que vai te ajudar a realizar melhor seus serviços. Esta Furadeira de impacto vai te ajudar a perfurar madeira, ferro e concreto com facilidade, pois tem potencia 400W, mandril de 10mm, é 100% rolamentada e vem com 2 velocidades:.2.200 e 2.800 rpm. E para deixar este equipamento ainda mais completo, ela já acompanha uma empunhadura e um limitador deprofundidade, além de possui sistema de reversão e impacto. Para você que é profissional ou apenas gosta de fazer aquelas pequenas reformas na sua casa a Furadeira de Impacto da Brocks é a ferramenta certa!',

    	'especificacao'=>'Nível de ruído: sem impacto - baixo, com impacto - alto

Potência (W): 400 Watts

Recursos: Impacto, 2 velocidades e reversão.

Rotação: 2.200 a 2.800 rpm

Vibração: Baixa

Mandril: 10mm

Alimentação: Energia Elétrica

Voltagem: 110 Volts


Recomendações de Uso:
Utilizar sempre a empunhadura e a broca correta para cada tipo de superfície.


Capacidade de Perfuração:

Madeira 13 mm
Aço 8 mm
Concreto 10mm',
 
       'resumo'=>'A Brocks traz a você agora uma ferramenta que vai te ajudar a realizar melhor seus serviços.',

        'imagem_1'=>'broks_1.jpg',
        'imagem_2'=>'broks_2.jpg',
        'imagem_3'=>'broks_3.jpg',
        'imagem_4'=>'broks_4.jpg',
        'imagem_5'=>'broks_5.jpg',
        'imagem_6'=>'broks_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'60.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'3',

        'id_subcategoria'=>'12',
'cont'=>'6',
        'id_marca'=>'1'

   ],    
 
                15=>[ 
	'nome' => 'Serra Elétrica 1200w Oregon',

     	'descricao'=>'Equipamento fácil de operar e manusear, economico, leve. Muito ágil, também indicado para uso na marcenaria e carpintaria.Sistema de lubrificação da corrente automático

 

Regulador da corrente lateral sem auxilio de chave

 

Trava de Segurança - Alavanca do freio da corrente

 

Ideal para o dia a dia, para trabalhos em casa ou sítio,
para podas de pequenas árvores, galhos, pomares.',

    	'especificacao'=>'Motor Monofásico universal
Rotação nominal: 6700 rpm
Potência do motor: 2200 watts
Lubrificação da corrente: Automática
Sabre: 16" (400mm) com ponta rolante
Ajuste de Corrente: Rápido e sem o uso de ferramentas',
 
       'resumo'=>'Equipamento fácil de operar e manusear, economico, leve. Muito ágil, também indicado para uso na marcenaria e carpintaria.',

        'imagem_1'=>'oregon_1.jpg',

        'imagem_2'=>'oregon_2.jpg',

        'imagem_3'=>'oregon_3.jpg',

        'imagem_4'=>'oregon_4.jpg',

        'imagem_5'=>'oregon_5.jpg',
        'imagem_6'=>'oregon_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'569.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'3',

        'id_subcategoria'=>'13',
'cont'=>'6',
        'id_marca'=>'1'

   ], 
16=>[ 
	'nome' => 'Acer Aspire E5',

     	'descricao'=>'Mais fino e com melhor desempenho, os notebooks Acer Aspire E5 são os parceiros ideais para ir a qualquer lugar e trabalhar a qualquer hora. Com até 5 horas de bateria e com o AcerCloud você ficará conectado o dia todo.            

O design elegante e funcional reúne todas as ferramentas necessárias para ampliar a sua produtividade e diversão.

A configuração superior é perfeita para usuários que necessitam de um portátil rápido e preciso para executar atividades mais exigentes como jogos e edição intensa de vídeos e fotos.',

    	'especificacao'=>'Marca do Processador:Intel ®,Gravador de DVD, Bluetooth, Rede, Modelo do Processador:Intel ® Core i5, Leitor de Cartões: Sim, Sistema Operacional:Windows 10, Série do Processador:5200U, Cache: 3MB, Clock:2.4GHz (com Turbo Boost de até 2.7GHz), Memória Ram: 8 GB',
 
       'resumo'=>'Mais fino e com melhor desempenho, os notebooks Acer Aspire E5 são os parceiros ideais para ir a qualquer lugar e trabalhar a qualquer hora',

        'imagem_1'=>'aspire_e5_1.jpg',

        'imagem_2'=>'aspire_e5_2.jpg',

        'imagem_3'=>'aspire_e5_3.jpg',

        'imagem_4'=>'aspire_e5_4.jpg',

        'imagem_5'=>'aspire_e5_5.jpg',
        'imagem_6'=>'aspire_e5_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'1099.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'5',

        'id_subcategoria'=>'17',
'cont'=>'6',
        'id_marca'=>'1'

   ],  
17=>[ 
	'nome' => 'Lenovo G485',

     	'descricao'=>'Notebook Lenovo G485-80C30002BR com tela LED de 14", memória RAM de 2GB, HD de 500GB, processador AMD C70 e sistema operacional Windows 8. Produto recertificado. Garania de 3 meses.',

    	'especificacao'=>'    Sistema Operacional Windows 8
    Processador Dual Core
    Marca Lenovo
    Arquitetura do Sistema 64 bits
    Modelo G485-80C30002BR
    HD 500 GB
    Tela 14"
    Memória 2 GB
    Tecnologia da Memória DDR3
    Tipo de Tela LED
    Placa de Video sim
    Gravador de DVD/CD sim
    Touchscreen não
    Leitor de Cartões sim
    HDMI 1 saída
    Wi/Fi sim
    Web Cam sim
    Microfone Embutido sim
    Placa de Rede 10/100M
    Bateria 6 células
    Voltagem bivolt
    Teclado numérico não
    Cor Preto
    Velocidade do Processador 1Ghz
    Peso 2,2 kg
    Porta USB 1x USB 2.0 / 2x USB 3.0
    Mouse TouchPad
    Dimensões aproximadas (cm) - AxLxP: 3x3.33x9.23 cm
    EAN-13 0887770568325
    Modelo Processador AMD
    Teclado Português Padrão ABNT
    Conteúdo da Embalagem Notebook / Bateria / Fonte',
 
       'resumo'=>'Notebook Lenovo G485-80C30002BR com tela LED de 14", memória RAM de 2GB, HD de 500GB, processador AMD C70 e sistema operacional Windows 8. Produto recertificado. Garania de 3 meses.',

        'imagem_1'=>'lenovo_g_1.jpg',

        'imagem_2'=>'lenovo_g_2.jpg',

        'imagem_3'=>'lenovo_g_3.jpg',

        'imagem_4'=>'lenovo_g_4.jpg',

        'imagem_5'=>'lenovo_g_5.jpg',
        'imagem_6'=>'lenovo_g_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'899.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'5',

        'id_subcategoria'=>'17',
'cont'=>'6',
        'id_marca'=>'1'

   ],  
  18=>[ 
	'nome' => 'Vaio Fit 15f',

     	'descricao'=>'Produto para quem busca sofisticação - Uma das mais conceituadas marcas globais de tecnologia, reconhecida internacionalmente por seus produtos meticulosamente desenvolvidos, que garantem alta qualidade e sofisticação.

Design Inspirado na porcelana japonesa - Suas curvas suaves e textura agradável remetem à obra prima de um artesão, que se preocupa com um resultado impecável e único.

Full Sound Experience. Uma experiência única de som - Com dois speakers de 2 Watts RMS cada e um subwoofer integrado, o VAIO® Fit 15F possui uma engenharia acústica desenvolvida para canalizar o som de maneira mais clara. Suas saídas localizadas na parte frontal do notebook permitem uma experiência única de som! O subwoofer localizado na parte inferior potencializa os sons graves, deixando mais real e emocionante suas músicas e filmes reproduzidos.

Mais que elegância. Ergonomia - Com design elegante e espaçado, aliado ao teclado alfanumérico, as teclas do VAIO® Fit 15F permitem uma experiência única de digitação. O touchpad está centralizado com a posição inicial do teclado, proporcionando mais conforto e praticidade na navegação.

Uma grande experiência de imagem e vídeo - A tela de 15.6 polegadas com resolução HD, aliada à potência do som, permite assistir confortavelmente a filmes com uma ótima experiência!

Alta performance, baixo consumo - Seu processador Intel® Core de 5ª geração possibilita um trabalho com alta performance e baixo consumo de energia. Disponível nos modelos Core i3, i5 e i7.',

    	'especificacao'=>'Cor: Branco
Processador: Intel ® Core i7-5500U 3.00GHz, 4 MB Cache, Dual Core
Sistema Operacional: Windows 10 Home Single Language
Memória RAM: 8GB (com suporte para até 16GB)
Slots de Memória: 2 x SO-DIMM DDR3L (um livre)
Disco Rígido (HDD): 1TB, SATA, 9,5mm, 5400 RPM
Unidade Ótica: Leitor e gravador de CD/DVD (Gravador de CD 24x, Gravador de DVD 8x)
Leitor de Cartões: SD / SDHC / SDXC
Webcam Frontal: Sim HD 1280x720P
Tela: LCD 15.6 Widescreen, resolução HD 1366 x 768 com tecnologia LED
Vídeo integrado: Intel® HD Graphics 5500 com suporte para Microsoft DirectX 11.2 e OpenGl 4.3
Áudio: 2 x speakers de 2 Watts e 1 x subwoofer integrado
Rede: Gigabit Ethernet (10/100/1000 Mbps)
Conectividade: Bluethoot 4.0 e Wi-FI IEEE 802.11 b/g/n
Conexões: 2 x USB 2.0, 2 x USB 3.0, 1 x HDMI, 1 x RJ-45, 1 x Áudio (para microfone e fone de ouvido) e 1x DC-in (carregador)
Segurança: abertura para trava tipo Kensington®
Teclado: Padrão Português-Brasil de 106 teclas
Mouse: Tipo Touchpad de 2 botões
Carregador: 100~240V Automático (65W)
Bateria: Li-ion, 4 células, 2600mAh (Integrada)',
 
       'resumo'=>'Produto para quem busca sofisticação - Uma das mais conceituadas marcas globais de tecnologia, reconhecida internacionalmente por seus produtos meticulosamente desenvolvidos, que garantem alta qualidade e sofisticação.',

        'imagem_1'=>'vaio_fit_1.jpg',

        'imagem_2'=>'vaio_fit_2.jpg',

        'imagem_3'=>'vaio_fit_3.jpg',

        'imagem_4'=>'vaio_fit_4.jpg',

        'imagem_5'=>'vaio_fit_5.jpg',
        'imagem_6'=>'vaio_fit_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'1999.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'5',

        'id_subcategoria'=>'17',
         'cont'=>'6',
        'id_marca'=>'1'

   ],  
   
   19=>[ 
	'nome' => 'Apple Macbook Air 11',

     	'descricao'=>'O MacBook Air vem com os processadores Intel Core i5 e i7 de quinta geração. Esta arquitetura ultraeficiente foi desenvolvida para consumir menos energia e ainda assim ter alto desempenho. Você não só vai poder fazer tudo o que quer, mas por mais tempo que antes. Além disso, o chip Intel HD Graphics 6000 proporciona um desempenho avançado que você vai notar principalmente com jogos e outras tarefas com gráficos mais exigentes.',

    	'especificacao'=>'Processador de 1,6GHz
Armazenamento de 128 GB

    Processador Intel Core i5 dual core, 1,6GHz
    Turbo Boost até 2,7GHz
    Processador gráfico Intel HD 6000
    4GB de memória
    128GB de armazenamento em flash com PCIe1
',
 
       'resumo'=>'O MacBook Air opera com a tecnologia Wi-Fi 802.11ac ultrarrápida.',

        'imagem_1'=>'air_11_1.jpg',

        'imagem_2'=>'air_11_2.jpg',

        'imagem_3'=>'air_11_3.jpg',

        'imagem_4'=>'air_11_4.jpg',

        'imagem_5'=>'air_11_5.jpg',
        'imagem_6'=>'air_11_6.jpg',

        'qtd_avalicao'=>'10',

        'preco_venda'=>'2999.99',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'5',

        'id_subcategoria'=>'17',
        'cont'=>'6',
        'id_marca'=>'1'

   ], 
  
      20=>[ 
	'nome' => 'Tv LED 32" LG LF550B',

     	'descricao'=>'A LG 32LF550B 32” é uma Game HDTV com jogos para toda a família. Traz um design metálico com bordas finas e base elegante, oferecendo mais estilo para a casa. Este modelo foi desenvolvido para quem busca definição de imagem e bons recursos. Com resolução HD 1366 x 768 pixels, oferece painel com frequência 60Hz para filmes de ação, esportes radicais e qualquer cena de maior movimento.',

    	'especificacao'=>'Games

Sem a necessidade de um console integrado à TV, este modelo traz o Monster World, um divertido jogo de ação; Bobble Pong, o clássico jogo de bolhas, bastante popular e feito tanto para crianças quanto para adultos; e Valentine, um enigmático jogo de combinações.
Energia

Com o recurso Smart Energy Saving, é possível controlar a luminosidade e ajustar o brilho da TV, utilizar a função tela-off que reproduz apenas o áudio, além do modo de espera Zero, que permite que a TV fique em standby de maneira eficaz e sem gastar energia. Com o Motion Eco Sensor, cada imagem reproduzida na tela é ajustada de acordo com a necessidade, reduzindo também o consumo.
Conectividade

Com duas entradas HDMI, é possível conectar aparelhos de alta definição como Home Theaters e Consoles de última geração. Possui ainda uma entrada USB para dispositivos externos de armazenamento como pen drives e outros, portanto é possível reproduzir filmes direto na tela e sem dificuldades.',
 
        'resumo'=>'A LG 32LF550B 32” é uma Game HDTV com jogos para toda a família. Traz um design metálico com bordas finas e base elegante, oferecendo mais estilo para a casa.',

        'imagem_1'=>'lcd_lt_tv_01.jpg',  
        'imagem_2'=>'0_0.jpg',

        'imagem_3'=>'0_0.jpg',

        'imagem_4'=>'0_0.jpg',

        'imagem_5'=>'0_0.jpg',
        'imagem_6'=>'0_0.jpg',
          
        'cont'=>'1',
          
        'qtd_avalicao'=>'10',

        'preco_venda'=>'999.67',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'6',

        'id_subcategoria'=>'19',
        
        'id_marca'=>'1'

   ],              
  21=>[ 
		'nome' => 'Panasonic TXL LED',

     	'descricao'=>'Alta definição em sua melhor forma. Encontre a melhor qualidade de imagem em Full HD com performance premium e recursos inteligentes de fácil utilização. O design único e sofisticado da TV contribui para a elegância da sua casa. ',

    	'especificacao'=>'E com o Hexa ChromaDrive você poderá ver mais cores na sua TV. Imagens mais nítidas do que qualquer outro televisor que você já teve. Graças a uma tecnologia exclusiva da Panasonic chamada Hexa ChromaDrive três cores (ciano, magenta e amarelo) ao tradicional RGB. Com seis cores no total e processamento avançado, a qualidade de imagem fica naturalmente deslumbrante. Essa VIERA leva você e sua família a um mundo completamente novo de visualização de imagens. ',
 
        'resumo'=>'Alta definição em sua melhor forma. Encontre a melhor qualidade de imagem em Full HD com performance premium e recursos inteligentes de fácil utilização. O design único e sofisticado da TV contribui para a elegância da sua casa. ',

        'imagem_1'=>'panasonic_txl_01.jpg',

         'imagem_2'=>'0_0.jpg',

        'imagem_3'=>'0_0.jpg',

        'imagem_4'=>'0_0.jpg',

        'imagem_5'=>'0_0.jpg',
        'imagem_6'=>'0_0.jpg',
          
        'cont'=>'1',
          
        'qtd_avalicao'=>'10',

        'preco_venda'=>'999.67',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'6',

        'id_subcategoria'=>'19',
        
        'id_marca'=>'1'

   ],                
  
  22=>[ 
		'nome' => 'Philips 47 PFL 7404',

     	'descricao'=>'Alta definição em sua melhor forma. Encontre a melhor qualidade de imagem em Full HD com performance premium e recursos inteligentes de fácil utilização. O design único e sofisticado da TV contribui para a elegância da sua casa. ',

    	'especificacao'=>'E com o Hexa ChromaDrive você poderá ver mais cores na sua TV. Imagens mais nítidas do que qualquer outro televisor que você já teve. Graças a uma tecnologia exclusiva da Panasonic chamada Hexa ChromaDrive três cores (ciano, magenta e amarelo) ao tradicional RGB. Com seis cores no total e processamento avançado, a qualidade de imagem fica naturalmente deslumbrante. Essa VIERA leva você e sua família a um mundo completamente novo de visualização de imagens. ',
 
        'resumo'=>'Alta definição em sua melhor forma. Encontre a melhor qualidade de imagem em Full HD com performance premium e recursos inteligentes de fácil utilização. O design único e sofisticado da TV contribui para a elegância da sua casa. ',

        'imagem_1'=>'LCD-TV-Philips-47-PFL-7404-H.jpg',

         'imagem_2'=>'0_0.jpg',

        'imagem_3'=>'0_0.jpg',

        'imagem_4'=>'0_0.jpg',

        'imagem_5'=>'0_0.jpg',
        'imagem_6'=>'0_0.jpg',
          
        'cont'=>'1',
          
        'qtd_avalicao'=>'10',

        'preco_venda'=>'1988.67',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'6',

        'id_subcategoria'=>'19',
        
        'id_marca'=>'1'

   ],   
   23=>[ 
		'nome' => 'TV LED Sharp Aquos LC-70',

     	'descricao'=>'Alta definição em sua melhor forma. Encontre a melhor qualidade de imagem em Full HD com performance premium e recursos inteligentes de fácil utilização. O design único e sofisticado da TV contribui para a elegância da sua casa. ',

    	'especificacao'=>'E com o Hexa ChromaDrive você poderá ver mais cores na sua TV. Imagens mais nítidas do que qualquer outro televisor que você já teve. Graças a uma tecnologia exclusiva da Panasonic chamada Hexa ChromaDrive três cores (ciano, magenta e amarelo) ao tradicional RGB. Com seis cores no total e processamento avançado, a qualidade de imagem fica naturalmente deslumbrante. Essa VIERA leva você e sua família a um mundo completamente novo de visualização de imagens. ',
 
        'resumo'=>'Alta definição em sua melhor forma. Encontre a melhor qualidade de imagem em Full HD com performance premium e recursos inteligentes de fácil utilização. O design único e sofisticado da TV contribui para a elegância da sua casa. ',

        'imagem_1'=>'sharp_01.jpg',

         'imagem_2'=>'0_0.jpg',

        'imagem_3'=>'0_0.jpg',

        'imagem_4'=>'0_0.jpg',

        'imagem_5'=>'0_0.jpg',
        'imagem_6'=>'0_0.jpg',
          
        'cont'=>'1',
          
        'qtd_avalicao'=>'10',

        'preco_venda'=>'1595.77',

        'qtd_estoque'=>'10',

        'lancamento'=>'true',

        'destaque'=>'true',

        'oferta'=>'true',

        'id_categoria'=>'6',

        'id_subcategoria'=>'19',
        
        'id_marca'=>'1'

   ],              

   
             ];
        DB::table('produto')->insert($produto);
    }
}

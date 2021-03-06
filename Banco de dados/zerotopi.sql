PGDMP                          y            zerotopi    13.2    13.2 ;    ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    16394    zerotopi    DATABASE     h   CREATE DATABASE zerotopi WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE zerotopi;
                postgres    false            ?            1259    16489    acerto    TABLE     ?   CREATE TABLE public.acerto (
    id_trilha integer NOT NULL,
    id_quiz integer NOT NULL,
    id_pergunta integer NOT NULL,
    id_jogador integer NOT NULL,
    ponto integer NOT NULL
);
    DROP TABLE public.acerto;
       public         heap    postgres    false            ?            1259    16462    alternativa    TABLE     ?   CREATE TABLE public.alternativa (
    id integer NOT NULL,
    letra character varying(12) NOT NULL,
    alternativa character varying(258) NOT NULL,
    id_pergunta integer NOT NULL,
    id_resposta integer
);
    DROP TABLE public.alternativa;
       public         heap    postgres    false            ?            1259    16460    alternativa_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.alternativa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.alternativa_id_seq;
       public          postgres    false    211                        0    0    alternativa_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.alternativa_id_seq OWNED BY public.alternativa.id;
          public          postgres    false    210            ?            1259    16446    pergunta    TABLE     ?   CREATE TABLE public.pergunta (
    id integer NOT NULL,
    pergunta character varying(1048) NOT NULL,
    id_quiz integer NOT NULL
);
    DROP TABLE public.pergunta;
       public         heap    postgres    false            ?            1259    16444    pergunta_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.pergunta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.pergunta_id_seq;
       public          postgres    false    209                       0    0    pergunta_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.pergunta_id_seq OWNED BY public.pergunta.id;
          public          postgres    false    208            ?            1259    16397    player    TABLE     ?   CREATE TABLE public.player (
    id integer NOT NULL,
    nome character varying(128) NOT NULL,
    email character varying(128) NOT NULL
);
    DROP TABLE public.player;
       public         heap    postgres    false            ?            1259    16395    player_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.player_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.player_id_seq;
       public          postgres    false    201                       0    0    player_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.player_id_seq OWNED BY public.player.id;
          public          postgres    false    200            ?            1259    16430    quiz    TABLE     ?   CREATE TABLE public.quiz (
    id integer NOT NULL,
    nome character varying(256) NOT NULL,
    descricao character varying(1048) NOT NULL,
    aprendizado character varying(1048) NOT NULL,
    id_trilha integer NOT NULL
);
    DROP TABLE public.quiz;
       public         heap    postgres    false            ?            1259    16428    quiz_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.quiz_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.quiz_id_seq;
       public          postgres    false    207                       0    0    quiz_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.quiz_id_seq OWNED BY public.quiz.id;
          public          postgres    false    206            ?            1259    16475    resposta    TABLE     i   CREATE TABLE public.resposta (
    id integer NOT NULL,
    resposta character varying(1048) NOT NULL
);
    DROP TABLE public.resposta;
       public         heap    postgres    false            ?            1259    16473    resposta_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.resposta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.resposta_id_seq;
       public          postgres    false    213                       0    0    resposta_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.resposta_id_seq OWNED BY public.resposta.id;
          public          postgres    false    212            ?            1259    16419    trilha    TABLE     ?   CREATE TABLE public.trilha (
    id integer NOT NULL,
    nome character varying(256) NOT NULL,
    descricao character varying(1048) NOT NULL
);
    DROP TABLE public.trilha;
       public         heap    postgres    false            ?            1259    16417    trilha_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.trilha_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.trilha_id_seq;
       public          postgres    false    205                       0    0    trilha_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.trilha_id_seq OWNED BY public.trilha.id;
          public          postgres    false    204            ?            1259    16408    user    TABLE     ?   CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying NOT NULL,
    password character varying(256) NOT NULL
);
    DROP TABLE public."user";
       public         heap    postgres    false            ?            1259    16406    user_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public          postgres    false    203                       0    0    user_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;
          public          postgres    false    202            U           2604    16465    alternativa id    DEFAULT     p   ALTER TABLE ONLY public.alternativa ALTER COLUMN id SET DEFAULT nextval('public.alternativa_id_seq'::regclass);
 =   ALTER TABLE public.alternativa ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            T           2604    16449    pergunta id    DEFAULT     j   ALTER TABLE ONLY public.pergunta ALTER COLUMN id SET DEFAULT nextval('public.pergunta_id_seq'::regclass);
 :   ALTER TABLE public.pergunta ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    209    209            P           2604    16400 	   player id    DEFAULT     f   ALTER TABLE ONLY public.player ALTER COLUMN id SET DEFAULT nextval('public.player_id_seq'::regclass);
 8   ALTER TABLE public.player ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    200    201    201            S           2604    16433    quiz id    DEFAULT     b   ALTER TABLE ONLY public.quiz ALTER COLUMN id SET DEFAULT nextval('public.quiz_id_seq'::regclass);
 6   ALTER TABLE public.quiz ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    206    207            V           2604    16478    resposta id    DEFAULT     j   ALTER TABLE ONLY public.resposta ALTER COLUMN id SET DEFAULT nextval('public.resposta_id_seq'::regclass);
 :   ALTER TABLE public.resposta ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            R           2604    16422 	   trilha id    DEFAULT     f   ALTER TABLE ONLY public.trilha ALTER COLUMN id SET DEFAULT nextval('public.trilha_id_seq'::regclass);
 8   ALTER TABLE public.trilha ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204    205            Q           2604    16411    user id    DEFAULT     d   ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);
 8   ALTER TABLE public."user" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203            ?          0    16489    acerto 
   TABLE DATA           T   COPY public.acerto (id_trilha, id_quiz, id_pergunta, id_jogador, ponto) FROM stdin;
    public          postgres    false    214   :>       ?          0    16462    alternativa 
   TABLE DATA           W   COPY public.alternativa (id, letra, alternativa, id_pergunta, id_resposta) FROM stdin;
    public          postgres    false    211   p>       ?          0    16446    pergunta 
   TABLE DATA           9   COPY public.pergunta (id, pergunta, id_quiz) FROM stdin;
    public          postgres    false    209   H?       ?          0    16397    player 
   TABLE DATA           1   COPY public.player (id, nome, email) FROM stdin;
    public          postgres    false    201   ??       ?          0    16430    quiz 
   TABLE DATA           K   COPY public.quiz (id, nome, descricao, aprendizado, id_trilha) FROM stdin;
    public          postgres    false    207   ??       ?          0    16475    resposta 
   TABLE DATA           0   COPY public.resposta (id, resposta) FROM stdin;
    public          postgres    false    213   ?A       ?          0    16419    trilha 
   TABLE DATA           5   COPY public.trilha (id, nome, descricao) FROM stdin;
    public          postgres    false    205   ?B       ?          0    16408    user 
   TABLE DATA           8   COPY public."user" (id, username, password) FROM stdin;
    public          postgres    false    203   HC                  0    0    alternativa_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.alternativa_id_seq', 9, true);
          public          postgres    false    210                       0    0    pergunta_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.pergunta_id_seq', 7, true);
          public          postgres    false    208            	           0    0    player_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.player_id_seq', 2, true);
          public          postgres    false    200            
           0    0    quiz_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.quiz_id_seq', 9, true);
          public          postgres    false    206                       0    0    resposta_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.resposta_id_seq', 31, true);
          public          postgres    false    212                       0    0    trilha_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.trilha_id_seq', 4, true);
          public          postgres    false    204                       0    0    user_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.user_id_seq', 1, true);
          public          postgres    false    202            b           2606    16467    alternativa alternativa_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.alternativa
    ADD CONSTRAINT alternativa_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.alternativa DROP CONSTRAINT alternativa_pkey;
       public            postgres    false    211            `           2606    16454    pergunta pergunta_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.pergunta
    ADD CONSTRAINT pergunta_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.pergunta DROP CONSTRAINT pergunta_pkey;
       public            postgres    false    209            X           2606    16405    player player_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.player
    ADD CONSTRAINT player_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.player DROP CONSTRAINT player_pkey;
       public            postgres    false    201            ^           2606    16438    quiz quiz_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.quiz
    ADD CONSTRAINT quiz_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.quiz DROP CONSTRAINT quiz_pkey;
       public            postgres    false    207            d           2606    16483    resposta resposta_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.resposta
    ADD CONSTRAINT resposta_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.resposta DROP CONSTRAINT resposta_pkey;
       public            postgres    false    213            \           2606    16427    trilha trilha_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.trilha
    ADD CONSTRAINT trilha_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.trilha DROP CONSTRAINT trilha_pkey;
       public            postgres    false    205            Z           2606    16416    user user_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_pkey;
       public            postgres    false    203            e           2606    16439    quiz fk_idtrilha    FK CONSTRAINT     ?   ALTER TABLE ONLY public.quiz
    ADD CONSTRAINT fk_idtrilha FOREIGN KEY (id_trilha) REFERENCES public.trilha(id) ON UPDATE RESTRICT ON DELETE RESTRICT NOT VALID;
 :   ALTER TABLE ONLY public.quiz DROP CONSTRAINT fk_idtrilha;
       public          postgres    false    2908    207    205            g           2606    16468    alternativa fk_pergunta    FK CONSTRAINT     }   ALTER TABLE ONLY public.alternativa
    ADD CONSTRAINT fk_pergunta FOREIGN KEY (id_pergunta) REFERENCES public.pergunta(id);
 A   ALTER TABLE ONLY public.alternativa DROP CONSTRAINT fk_pergunta;
       public          postgres    false    209    2912    211            f           2606    16455    pergunta fk_quiz    FK CONSTRAINT     n   ALTER TABLE ONLY public.pergunta
    ADD CONSTRAINT fk_quiz FOREIGN KEY (id_quiz) REFERENCES public.quiz(id);
 :   ALTER TABLE ONLY public.pergunta DROP CONSTRAINT fk_quiz;
       public          postgres    false    209    207    2910            h           2606    16484    alternativa fk_resposta    FK CONSTRAINT     ?   ALTER TABLE ONLY public.alternativa
    ADD CONSTRAINT fk_resposta FOREIGN KEY (id_resposta) REFERENCES public.resposta(id) NOT VALID;
 A   ALTER TABLE ONLY public.alternativa DROP CONSTRAINT fk_resposta;
       public          postgres    false    211    2916    213            ?   &   x?3?4?4?4?4?2Fa?S ??<l,??Y1z\\\ d??      ?   ?   x?M?KN1?ur
? (SZX#???????$?:?\	??S?bx?C???-???w??'?u\??$?s'?\?ٺE%?&?V:TҕǇ?!H	?:?J`twz?7?q<??kǔ?4?H-m\VJ??G?wM"V?*5҂??m?ɽ?????Q`AE?h0?s@Q?)C????cӦ;?dy_T?p?M4??BP??Οn???p^?      ?   .   x?3??W(,MU8?R?47Q!7?(9ўӘ˜?$??$Ȋ???? ??
?      ?   T   x?3??q??sr?W?s?tT?wrVpqU?	uv?s??I??K,J??)MN?K423tH?M???K???2?,I-.I??H?1z\\\ ??\      ?   ?  x??T?n?0?????8i?1?tKp?܅'???P?}??d-?~?R?!?NE4l?????VS]K??I"\M????#u??BT?0=??? ?h??p?i ?J-'? )C?n??Y\?J?Eh	?V??#ibK????G??W9???9?x*??ׅ????n몝?O?!:8??? g4#`???????Ԙ?8??-?l???u???o?W?n?q???0B??Á?EV?)?e?,;k?ƥ5%?|o?\????d??&>??e=Ń?A H?-"K?????????>?vJ?g?QW9??/???f!??1????:????rg?703???I??r?a+?g??FS?3?n?T?0?h~????????0??b?qG?g???5????uF?x?W?6e??pQ]zFwk????ZIɇ????b?W??6?Y???u?ȵ??      ?   ?   x??O;N1?קx@+?@I?ETi&?Y?=??^q
-G?Ř?p?L3??y??vx߿@??J??ͧ???wA̢?????'t???j\^TYi\O|??*)Z"$R??h	3?"?ɴ*??(?d??*?X	YP?!???(#f???"j?!.?1?JJ?b&???Arv???U<????/??&???vt??P?T7?_f??????v????`????n?:?~ ~       ?   ?   x?}?1?0E???,?#??NL,njP?ԑ?p(???pU???/????Ù4??SU^f?̸???ڲ??A?L
넲X?e?!??xil?*?????????Ա???vv?S/?ғ?#L&e??f?Ϊ?x??ks???5dJF      ?   4   x?3?LL????42426J3?4O4?DscK?D?T?Dôdc?=... ?(     
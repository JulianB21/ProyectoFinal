PGDMP     	                	    v            proyectofinal    11.0    11.0 U    t           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            u           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            v           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            w           1262    16393    proyectofinal    DATABASE     �   CREATE DATABASE proyectofinal WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Colombia.1252' LC_CTYPE = 'Spanish_Colombia.1252';
    DROP DATABASE proyectofinal;
             postgres    false            �            1259    16394    acta_responsabilidad    TABLE     �   CREATE TABLE public.acta_responsabilidad (
    idacta integer NOT NULL,
    numdocumentoaprendiz integer NOT NULL,
    idequipo integer NOT NULL,
    fechaacta timestamp without time zone NOT NULL
);
 (   DROP TABLE public.acta_responsabilidad;
       public         postgres    false            �            1259    16397    acta_responsabilidad_idacta_seq    SEQUENCE     �   CREATE SEQUENCE public.acta_responsabilidad_idacta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.acta_responsabilidad_idacta_seq;
       public       postgres    false    196            x           0    0    acta_responsabilidad_idacta_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.acta_responsabilidad_idacta_seq OWNED BY public.acta_responsabilidad.idacta;
            public       postgres    false    197            �            1259    16399    ambiente    TABLE     �   CREATE TABLE public.ambiente (
    idambiente integer NOT NULL,
    idprograma integer NOT NULL,
    nombreambiente character varying(50) NOT NULL,
    ubicacionambiente character varying(100)
);
    DROP TABLE public.ambiente;
       public         postgres    false            �            1259    16402    ambiente_idambiente_seq    SEQUENCE     �   CREATE SEQUENCE public.ambiente_idambiente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.ambiente_idambiente_seq;
       public       postgres    false    198            y           0    0    ambiente_idambiente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.ambiente_idambiente_seq OWNED BY public.ambiente.idambiente;
            public       postgres    false    199            �            1259    16404    aprendiz    TABLE       CREATE TABLE public.aprendiz (
    numdocumentoaprendiz double precision NOT NULL,
    numeroficha integer NOT NULL,
    nombreaprendiz character varying(50) NOT NULL,
    telefonoaprendiz double precision NOT NULL,
    emailaprendiz character varying(50) NOT NULL
);
    DROP TABLE public.aprendiz;
       public         postgres    false            �            1259    16407    articulo    TABLE     �  CREATE TABLE public.articulo (
    idarticulo integer NOT NULL,
    idambiente integer NOT NULL,
    idequipo integer,
    idcategoria integer NOT NULL,
    tipoarticulo character varying(50) NOT NULL,
    modeloarticulo character varying(50) NOT NULL,
    marcaarticulo character varying(50),
    caracteristicaarticulo text,
    estadoarticulo character varying(10),
    numinventariosena character varying(50),
    serialarticulo character varying(50)
);
    DROP TABLE public.articulo;
       public         postgres    false            �            1259    16413    articulo_idarticulo_seq    SEQUENCE     �   CREATE SEQUENCE public.articulo_idarticulo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.articulo_idarticulo_seq;
       public       postgres    false    201            z           0    0    articulo_idarticulo_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.articulo_idarticulo_seq OWNED BY public.articulo.idarticulo;
            public       postgres    false    202            �            1259    16415    articulonovedad    TABLE     �   CREATE TABLE public.articulonovedad (
    idarticulo integer NOT NULL,
    idnovedad integer NOT NULL,
    tiponovedad character varying(50) NOT NULL,
    observacionnovedad text
);
 #   DROP TABLE public.articulonovedad;
       public         postgres    false            �            1259    16421 	   categoria    TABLE     x   CREATE TABLE public.categoria (
    idcategoria integer NOT NULL,
    nombrecategoria character varying(50) NOT NULL
);
    DROP TABLE public.categoria;
       public         postgres    false            �            1259    16424    categoria_idcategoria_seq    SEQUENCE     �   CREATE SEQUENCE public.categoria_idcategoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.categoria_idcategoria_seq;
       public       postgres    false    204            {           0    0    categoria_idcategoria_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.categoria_idcategoria_seq OWNED BY public.categoria.idcategoria;
            public       postgres    false    205            �            1259    16426    equipo    TABLE     %  CREATE TABLE public.equipo (
    idequipo integer NOT NULL,
    nombreequipo character varying(50) NOT NULL,
    estadoequipo text NOT NULL,
    numarticulosequipo character varying(50) NOT NULL,
    observacionequipo character varying(200),
    numarticulosagregados character varying(50)
);
    DROP TABLE public.equipo;
       public         postgres    false            �            1259    16432    equipo_idequipo_seq    SEQUENCE     |   CREATE SEQUENCE public.equipo_idequipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.equipo_idequipo_seq;
       public       postgres    false    206            |           0    0    equipo_idequipo_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.equipo_idequipo_seq OWNED BY public.equipo.idequipo;
            public       postgres    false    207            �            1259    16434    ficha    TABLE       CREATE TABLE public.ficha (
    numeroficha integer NOT NULL,
    idprograma integer NOT NULL,
    idambiente integer NOT NULL,
    fechainicio character varying(50) NOT NULL,
    fechafin character varying(50) NOT NULL,
    jornadaficha character varying(50) NOT NULL
);
    DROP TABLE public.ficha;
       public         postgres    false            �            1259    16437    novedad    TABLE     )  CREATE TABLE public.novedad (
    idnovedad integer NOT NULL,
    numdocumentousuario integer NOT NULL,
    usuarionovedad character varying(50) NOT NULL,
    numeroficha integer NOT NULL,
    fechanovedad text NOT NULL,
    articulo character varying(50) NOT NULL,
    estado boolean NOT NULL
);
    DROP TABLE public.novedad;
       public         postgres    false            �            1259    16443    novedad_idnovedad_seq    SEQUENCE     ~   CREATE SEQUENCE public.novedad_idnovedad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.novedad_idnovedad_seq;
       public       postgres    false    209            }           0    0    novedad_idnovedad_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.novedad_idnovedad_seq OWNED BY public.novedad.idnovedad;
            public       postgres    false    210            �            1259    16445    programa    TABLE     �   CREATE TABLE public.programa (
    idprograma integer NOT NULL,
    nombreprograma character varying(50) NOT NULL,
    duracionprograma character varying(50) NOT NULL,
    tipoprograma character varying(50)
);
    DROP TABLE public.programa;
       public         postgres    false            �            1259    16448    programa_idprograma_seq    SEQUENCE     �   CREATE SEQUENCE public.programa_idprograma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.programa_idprograma_seq;
       public       postgres    false    211            ~           0    0    programa_idprograma_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.programa_idprograma_seq OWNED BY public.programa.idprograma;
            public       postgres    false    212            �            1259    16450    usuario    TABLE       CREATE TABLE public.usuario (
    numdocumentousuario integer NOT NULL,
    idprograma integer,
    nombreusuario character varying(50) NOT NULL,
    contraseniausuario character varying(200) NOT NULL,
    rolusuario character varying(50) NOT NULL,
    fotousuario text
);
    DROP TABLE public.usuario;
       public         postgres    false            �
           2604    16456    acta_responsabilidad idacta    DEFAULT     �   ALTER TABLE ONLY public.acta_responsabilidad ALTER COLUMN idacta SET DEFAULT nextval('public.acta_responsabilidad_idacta_seq'::regclass);
 J   ALTER TABLE public.acta_responsabilidad ALTER COLUMN idacta DROP DEFAULT;
       public       postgres    false    197    196            �
           2604    16457    ambiente idambiente    DEFAULT     z   ALTER TABLE ONLY public.ambiente ALTER COLUMN idambiente SET DEFAULT nextval('public.ambiente_idambiente_seq'::regclass);
 B   ALTER TABLE public.ambiente ALTER COLUMN idambiente DROP DEFAULT;
       public       postgres    false    199    198            �
           2604    16458    articulo idarticulo    DEFAULT     z   ALTER TABLE ONLY public.articulo ALTER COLUMN idarticulo SET DEFAULT nextval('public.articulo_idarticulo_seq'::regclass);
 B   ALTER TABLE public.articulo ALTER COLUMN idarticulo DROP DEFAULT;
       public       postgres    false    202    201            �
           2604    16459    categoria idcategoria    DEFAULT     ~   ALTER TABLE ONLY public.categoria ALTER COLUMN idcategoria SET DEFAULT nextval('public.categoria_idcategoria_seq'::regclass);
 D   ALTER TABLE public.categoria ALTER COLUMN idcategoria DROP DEFAULT;
       public       postgres    false    205    204            �
           2604    16460    equipo idequipo    DEFAULT     r   ALTER TABLE ONLY public.equipo ALTER COLUMN idequipo SET DEFAULT nextval('public.equipo_idequipo_seq'::regclass);
 >   ALTER TABLE public.equipo ALTER COLUMN idequipo DROP DEFAULT;
       public       postgres    false    207    206            �
           2604    16461    novedad idnovedad    DEFAULT     v   ALTER TABLE ONLY public.novedad ALTER COLUMN idnovedad SET DEFAULT nextval('public.novedad_idnovedad_seq'::regclass);
 @   ALTER TABLE public.novedad ALTER COLUMN idnovedad DROP DEFAULT;
       public       postgres    false    210    209            �
           2604    16462    programa idprograma    DEFAULT     z   ALTER TABLE ONLY public.programa ALTER COLUMN idprograma SET DEFAULT nextval('public.programa_idprograma_seq'::regclass);
 B   ALTER TABLE public.programa ALTER COLUMN idprograma DROP DEFAULT;
       public       postgres    false    212    211            `          0    16394    acta_responsabilidad 
   TABLE DATA               a   COPY public.acta_responsabilidad (idacta, numdocumentoaprendiz, idequipo, fechaacta) FROM stdin;
    public       postgres    false    196   �e       b          0    16399    ambiente 
   TABLE DATA               ]   COPY public.ambiente (idambiente, idprograma, nombreambiente, ubicacionambiente) FROM stdin;
    public       postgres    false    198   �e       d          0    16404    aprendiz 
   TABLE DATA               v   COPY public.aprendiz (numdocumentoaprendiz, numeroficha, nombreaprendiz, telefonoaprendiz, emailaprendiz) FROM stdin;
    public       postgres    false    200   f       e          0    16407    articulo 
   TABLE DATA               �   COPY public.articulo (idarticulo, idambiente, idequipo, idcategoria, tipoarticulo, modeloarticulo, marcaarticulo, caracteristicaarticulo, estadoarticulo, numinventariosena, serialarticulo) FROM stdin;
    public       postgres    false    201   �g       g          0    16415    articulonovedad 
   TABLE DATA               a   COPY public.articulonovedad (idarticulo, idnovedad, tiponovedad, observacionnovedad) FROM stdin;
    public       postgres    false    203   �h       h          0    16421 	   categoria 
   TABLE DATA               A   COPY public.categoria (idcategoria, nombrecategoria) FROM stdin;
    public       postgres    false    204   i       j          0    16426    equipo 
   TABLE DATA               �   COPY public.equipo (idequipo, nombreequipo, estadoequipo, numarticulosequipo, observacionequipo, numarticulosagregados) FROM stdin;
    public       postgres    false    206   Ei       l          0    16434    ficha 
   TABLE DATA               i   COPY public.ficha (numeroficha, idprograma, idambiente, fechainicio, fechafin, jornadaficha) FROM stdin;
    public       postgres    false    208   �i       m          0    16437    novedad 
   TABLE DATA               ~   COPY public.novedad (idnovedad, numdocumentousuario, usuarionovedad, numeroficha, fechanovedad, articulo, estado) FROM stdin;
    public       postgres    false    209   �i       o          0    16445    programa 
   TABLE DATA               ^   COPY public.programa (idprograma, nombreprograma, duracionprograma, tipoprograma) FROM stdin;
    public       postgres    false    211   Wj       q          0    16450    usuario 
   TABLE DATA               ~   COPY public.usuario (numdocumentousuario, idprograma, nombreusuario, contraseniausuario, rolusuario, fotousuario) FROM stdin;
    public       postgres    false    213   �j                  0    0    acta_responsabilidad_idacta_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.acta_responsabilidad_idacta_seq', 1, false);
            public       postgres    false    197            �           0    0    ambiente_idambiente_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.ambiente_idambiente_seq', 9, true);
            public       postgres    false    199            �           0    0    articulo_idarticulo_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.articulo_idarticulo_seq', 22, true);
            public       postgres    false    202            �           0    0    categoria_idcategoria_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.categoria_idcategoria_seq', 8, true);
            public       postgres    false    205            �           0    0    equipo_idequipo_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.equipo_idequipo_seq', 7, true);
            public       postgres    false    207            �           0    0    novedad_idnovedad_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.novedad_idnovedad_seq', 29, true);
            public       postgres    false    210            �           0    0    programa_idprograma_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.programa_idprograma_seq', 10, true);
            public       postgres    false    212            �
           2606    16464 ,   acta_responsabilidad acta_responsabilidad_pk 
   CONSTRAINT     n   ALTER TABLE ONLY public.acta_responsabilidad
    ADD CONSTRAINT acta_responsabilidad_pk PRIMARY KEY (idacta);
 V   ALTER TABLE ONLY public.acta_responsabilidad DROP CONSTRAINT acta_responsabilidad_pk;
       public         postgres    false    196            �
           2606    16466    ambiente ambiente_pk 
   CONSTRAINT     Z   ALTER TABLE ONLY public.ambiente
    ADD CONSTRAINT ambiente_pk PRIMARY KEY (idambiente);
 >   ALTER TABLE ONLY public.ambiente DROP CONSTRAINT ambiente_pk;
       public         postgres    false    198            �
           2606    16468    aprendiz aprendiz_pk 
   CONSTRAINT     d   ALTER TABLE ONLY public.aprendiz
    ADD CONSTRAINT aprendiz_pk PRIMARY KEY (numdocumentoaprendiz);
 >   ALTER TABLE ONLY public.aprendiz DROP CONSTRAINT aprendiz_pk;
       public         postgres    false    200            �
           2606    16470    articulo articulo_pk 
   CONSTRAINT     Z   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_pk PRIMARY KEY (idarticulo);
 >   ALTER TABLE ONLY public.articulo DROP CONSTRAINT articulo_pk;
       public         postgres    false    201            �
           2606    16472 "   articulonovedad articulonovedad_pk 
   CONSTRAINT     s   ALTER TABLE ONLY public.articulonovedad
    ADD CONSTRAINT articulonovedad_pk PRIMARY KEY (idarticulo, idnovedad);
 L   ALTER TABLE ONLY public.articulonovedad DROP CONSTRAINT articulonovedad_pk;
       public         postgres    false    203    203            �
           2606    16474    categoria categoria_pk 
   CONSTRAINT     ]   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pk PRIMARY KEY (idcategoria);
 @   ALTER TABLE ONLY public.categoria DROP CONSTRAINT categoria_pk;
       public         postgres    false    204            �
           2606    16476    equipo equipo_pk 
   CONSTRAINT     T   ALTER TABLE ONLY public.equipo
    ADD CONSTRAINT equipo_pk PRIMARY KEY (idequipo);
 :   ALTER TABLE ONLY public.equipo DROP CONSTRAINT equipo_pk;
       public         postgres    false    206            �
           2606    16478    ficha ficha_pk 
   CONSTRAINT     U   ALTER TABLE ONLY public.ficha
    ADD CONSTRAINT ficha_pk PRIMARY KEY (numeroficha);
 8   ALTER TABLE ONLY public.ficha DROP CONSTRAINT ficha_pk;
       public         postgres    false    208            �
           2606    16480    novedad novedad_pk 
   CONSTRAINT     W   ALTER TABLE ONLY public.novedad
    ADD CONSTRAINT novedad_pk PRIMARY KEY (idnovedad);
 <   ALTER TABLE ONLY public.novedad DROP CONSTRAINT novedad_pk;
       public         postgres    false    209            �
           2606    16482    programa programa_pk 
   CONSTRAINT     Z   ALTER TABLE ONLY public.programa
    ADD CONSTRAINT programa_pk PRIMARY KEY (idprograma);
 >   ALTER TABLE ONLY public.programa DROP CONSTRAINT programa_pk;
       public         postgres    false    211            �
           2606    16484    usuario usuario_pk 
   CONSTRAINT     a   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pk PRIMARY KEY (numdocumentousuario);
 <   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pk;
       public         postgres    false    213            �
           1259    16485 
   idambiente    INDEX     B   CREATE INDEX idambiente ON public.ficha USING btree (idambiente);
    DROP INDEX public.idambiente;
       public         postgres    false    208            �
           1259    16486    idcategoria    INDEX     G   CREATE INDEX idcategoria ON public.articulo USING btree (idcategoria);
    DROP INDEX public.idcategoria;
       public         postgres    false    201            �
           1259    16487    idequipo    INDEX     M   CREATE INDEX idequipo ON public.acta_responsabilidad USING btree (idequipo);
    DROP INDEX public.idequipo;
       public         postgres    false    196            �
           1259    16488 	   idnovedad    INDEX     J   CREATE INDEX idnovedad ON public.articulonovedad USING btree (idnovedad);
    DROP INDEX public.idnovedad;
       public         postgres    false    203            �
           1259    16489 
   idprograma    INDEX     E   CREATE INDEX idprograma ON public.ambiente USING btree (idprograma);
    DROP INDEX public.idprograma;
       public         postgres    false    198            �
           1259    16490    numdocumentoaprendiz    INDEX     e   CREATE INDEX numdocumentoaprendiz ON public.acta_responsabilidad USING btree (numdocumentoaprendiz);
 (   DROP INDEX public.numdocumentoaprendiz;
       public         postgres    false    196            �
           1259    16491    numdocumentousuario    INDEX     V   CREATE INDEX numdocumentousuario ON public.novedad USING btree (numdocumentousuario);
 '   DROP INDEX public.numdocumentousuario;
       public         postgres    false    209            �
           1259    16492    numeroficha    INDEX     F   CREATE INDEX numeroficha ON public.novedad USING btree (numeroficha);
    DROP INDEX public.numeroficha;
       public         postgres    false    209            �
           2606    16493 0   acta_responsabilidad acta_responsabilidad_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.acta_responsabilidad
    ADD CONSTRAINT acta_responsabilidad_ibfk_1 FOREIGN KEY (numdocumentoaprendiz) REFERENCES public.aprendiz(numdocumentoaprendiz);
 Z   ALTER TABLE ONLY public.acta_responsabilidad DROP CONSTRAINT acta_responsabilidad_ibfk_1;
       public       postgres    false    200    2757    196            �
           2606    16498 0   acta_responsabilidad acta_responsabilidad_ibfk_2    FK CONSTRAINT     �   ALTER TABLE ONLY public.acta_responsabilidad
    ADD CONSTRAINT acta_responsabilidad_ibfk_2 FOREIGN KEY (idequipo) REFERENCES public.equipo(idequipo);
 Z   ALTER TABLE ONLY public.acta_responsabilidad DROP CONSTRAINT acta_responsabilidad_ibfk_2;
       public       postgres    false    206    196    2767            �
           2606    16503    ambiente ambiente_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.ambiente
    ADD CONSTRAINT ambiente_ibfk_1 FOREIGN KEY (idprograma) REFERENCES public.programa(idprograma);
 B   ALTER TABLE ONLY public.ambiente DROP CONSTRAINT ambiente_ibfk_1;
       public       postgres    false    211    198    2776            �
           2606    16508    aprendiz aprendiz_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.aprendiz
    ADD CONSTRAINT aprendiz_ibfk_1 FOREIGN KEY (numeroficha) REFERENCES public.ficha(numeroficha);
 B   ALTER TABLE ONLY public.aprendiz DROP CONSTRAINT aprendiz_ibfk_1;
       public       postgres    false    2769    208    200            �
           2606    16513    articulo articulo_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_ibfk_1 FOREIGN KEY (idambiente) REFERENCES public.ambiente(idambiente);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT articulo_ibfk_1;
       public       postgres    false    201    2754    198            �
           2606    16518    articulo articulo_ibfk_2    FK CONSTRAINT        ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_ibfk_2 FOREIGN KEY (idequipo) REFERENCES public.equipo(idequipo);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT articulo_ibfk_2;
       public       postgres    false    206    2767    201            �
           2606    16523    articulo articulo_ibfk_3    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_ibfk_3 FOREIGN KEY (idcategoria) REFERENCES public.categoria(idcategoria);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT articulo_ibfk_3;
       public       postgres    false    204    2765    201            �
           2606    16528 &   articulonovedad articulonovedad_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulonovedad
    ADD CONSTRAINT articulonovedad_ibfk_1 FOREIGN KEY (idarticulo) REFERENCES public.articulo(idarticulo);
 P   ALTER TABLE ONLY public.articulonovedad DROP CONSTRAINT articulonovedad_ibfk_1;
       public       postgres    false    201    2759    203            �
           2606    16533 &   articulonovedad articulonovedad_ibfk_2    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulonovedad
    ADD CONSTRAINT articulonovedad_ibfk_2 FOREIGN KEY (idnovedad) REFERENCES public.novedad(idnovedad);
 P   ALTER TABLE ONLY public.articulonovedad DROP CONSTRAINT articulonovedad_ibfk_2;
       public       postgres    false    2772    203    209            �
           2606    16538    ficha ficha_ibfk_1    FK CONSTRAINT        ALTER TABLE ONLY public.ficha
    ADD CONSTRAINT ficha_ibfk_1 FOREIGN KEY (idprograma) REFERENCES public.programa(idprograma);
 <   ALTER TABLE ONLY public.ficha DROP CONSTRAINT ficha_ibfk_1;
       public       postgres    false    211    208    2776            �
           2606    16543    ficha ficha_ibfk_2    FK CONSTRAINT        ALTER TABLE ONLY public.ficha
    ADD CONSTRAINT ficha_ibfk_2 FOREIGN KEY (idambiente) REFERENCES public.ambiente(idambiente);
 <   ALTER TABLE ONLY public.ficha DROP CONSTRAINT ficha_ibfk_2;
       public       postgres    false    198    208    2754            �
           2606    16548    usuario usuario_ibfk_1    FK CONSTRAINT     �   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_ibfk_1 FOREIGN KEY (idprograma) REFERENCES public.programa(idprograma);
 @   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_ibfk_1;
       public       postgres    false    2776    211    213            `      x������ � �      b   /   x����t�u�t�qU����44�q	�t9�( ��b���� �
�      d   g  x����J�@���S���\3;��j)E�96AS�3�袾U��/�IS;A��p!�/���#�,�,Ʉ���dXZpKrj�9��2�shȤ�Kp�$�)i�`<Kx)����9yZ@e3�H3!U;������3 Y�sӎ	�k�KG��Vȹ�'��d��@� W��<��h�jr�t�
~�WĨ\
%��{��v;{2��QY�7AQƈTRK
Ġx(�r��^$�$$<+�`Ug��z� �Ѷ�6�ε
�M�}CW�����/8��%����QU[��7�]M��!~�秏���#�H;�w���[EDMC����p�v��  �[��C��[���{�?[�}���Mi�~�u��      e   �   x�=�Mn�0��ϧ�	����4v�1����"eeӲ��{�(=C.��h�fdi>ϛ�RH���B��n��P��P-�L"Mb�3�X�C0\���Gq ���Rk�G��d<��kC�^���_<^ͥz��T�a��<�1D"�x!`�Bz��s��H[Yc{j6�f��6�L�m�κ�`��*	�4�2FQ����B��$L7��3��e�_�S�\L�	�)J�`<�N������E䊋�]�c��V*      g   a   x�34�42�tq<<��ş��<�<��<��М�Ȃ3�5��(�ed��Ted�gdgeepZpY�U��%����iRrYR��HfW� �*      h   )   x�3�qu����w�t��t��	
uv�������� �=�      j   /   x�3�t24�tqvt�st��4��4�2�t
��L89M�b���� ��	      l   D   x�34�4��4���44�"#CCN##}# �Ȉ3�1�ŕ��Ș��I�!B�����+W� a��      m   o   x�u�A�0����^ әB�u� �&�p�1��.M�N�/���<��R�}��c[f���FvaL��N`�ǩI���a?%�*+1H´=��������v��s��f�      o   E   x���tt	��42Q�uv�qu�;<���ݟ�� (����������ihSu�����ٟ+F��� _��      q   a  x�m��n�A����I�{<���."A@m�u��%J%�"��gv ��H��sX���v��x:������7u"���Pٵ(1�Δn%D���X��N�^��N������y��V١锜]G�9��7�ݭ��1�H�?� lc;�W���y%9��4%�6����Q���*��]�;z��L�ބ»�h@u⤥S���뜗��*�h��!8;wĨ#������~��p�z9�����������^i��v�!�e{x��pw:~��`=��֒�ZhSk4b,R]�p2���Bi��Z���ơi�s�;;	,���S0����3{o�(kȈD�Si1�H�'_�uڿ}��^����7u���     
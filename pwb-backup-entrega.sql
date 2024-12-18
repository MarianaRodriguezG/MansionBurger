PGDMP  /    9    
            |            pwb    16.3    16.3 )    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16397    pwb    DATABASE     v   CREATE DATABASE pwb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE pwb;
                postgres    false            �            1259    40963    carrito_id_seq    SEQUENCE     w   CREATE SEQUENCE public.carrito_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.carrito_id_seq;
       public          postgres    false            �            1259    40964    carrito    TABLE     �   CREATE TABLE public.carrito (
    id integer DEFAULT nextval('public.carrito_id_seq'::regclass) NOT NULL,
    descripcion character varying(255),
    precio numeric(10,2)
);
    DROP TABLE public.carrito;
       public         heap    postgres    false    219            �            1259    40971    compras    TABLE       CREATE TABLE public.compras (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    direccion text NOT NULL,
    opcion_envio character varying(20) NOT NULL,
    carrito jsonb NOT NULL,
    fecha timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.compras;
       public         heap    postgres    false            �            1259    40970    compras_id_seq    SEQUENCE     �   CREATE SEQUENCE public.compras_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.compras_id_seq;
       public          postgres    false    222            �           0    0    compras_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.compras_id_seq OWNED BY public.compras.id;
          public          postgres    false    221            �            1259    41027    pedidos    TABLE       CREATE TABLE public.pedidos (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    direccion character varying(255) NOT NULL,
    total numeric(10,2) NOT NULL,
    fecha timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    detalles text NOT NULL
);
    DROP TABLE public.pedidos;
       public         heap    postgres    false            �            1259    41026    pedidos_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pedidos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.pedidos_id_seq;
       public          postgres    false    225            �           0    0    pedidos_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.pedidos_id_seq OWNED BY public.pedidos.id;
          public          postgres    false    224            �            1259    16423    producto    TABLE     �   CREATE TABLE public.producto (
    id integer NOT NULL,
    nombre character varying(100),
    precio numeric(10,2),
    stock integer
);
    DROP TABLE public.producto;
       public         heap    postgres    false            �            1259    16422    producto_id_seq    SEQUENCE     �   CREATE SEQUENCE public.producto_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.producto_id_seq;
       public          postgres    false    218            �           0    0    producto_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.producto_id_seq OWNED BY public.producto.id;
          public          postgres    false    217            �            1259    41011 	   productos    TABLE     �   CREATE TABLE public.productos (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text,
    precio numeric(10,2) NOT NULL,
    imagen text,
    stock integer NOT NULL
);
    DROP TABLE public.productos;
       public         heap    postgres    false            �            1259    16398    usuarios    TABLE     i  CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nombre character varying(30) NOT NULL,
    apellido1 character varying(30) NOT NULL,
    apellido2 character varying(30),
    correo character varying(200) NOT NULL,
    contrasenia bytea NOT NULL,
    telefono character varying(10),
    genero character(1),
    rol character varying(10) NOT NULL
);
    DROP TABLE public.usuarios;
       public         heap    postgres    false            �            1259    16403    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public          postgres    false    215            �           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public          postgres    false    216            5           2604    41007 
   compras id    DEFAULT     h   ALTER TABLE ONLY public.compras ALTER COLUMN id SET DEFAULT nextval('public.compras_id_seq'::regclass);
 9   ALTER TABLE public.compras ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    222    222            7           2604    41030 
   pedidos id    DEFAULT     h   ALTER TABLE ONLY public.pedidos ALTER COLUMN id SET DEFAULT nextval('public.pedidos_id_seq'::regclass);
 9   ALTER TABLE public.pedidos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225            3           2604    41009    producto id    DEFAULT     j   ALTER TABLE ONLY public.producto ALTER COLUMN id SET DEFAULT nextval('public.producto_id_seq'::regclass);
 :   ALTER TABLE public.producto ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            2           2604    41010    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215            �          0    40964    carrito 
   TABLE DATA           :   COPY public.carrito (id, descripcion, precio) FROM stdin;
    public          postgres    false    220   �,       �          0    40971    compras 
   TABLE DATA           V   COPY public.compras (id, nombre, direccion, opcion_envio, carrito, fecha) FROM stdin;
    public          postgres    false    222   �,       �          0    41027    pedidos 
   TABLE DATA           P   COPY public.pedidos (id, nombre, direccion, total, fecha, detalles) FROM stdin;
    public          postgres    false    225   �,       �          0    16423    producto 
   TABLE DATA           =   COPY public.producto (id, nombre, precio, stock) FROM stdin;
    public          postgres    false    218   �,       �          0    41011 	   productos 
   TABLE DATA           S   COPY public.productos (id, nombre, descripcion, precio, imagen, stock) FROM stdin;
    public          postgres    false    223   �-       �          0    16398    usuarios 
   TABLE DATA           p   COPY public.usuarios (id, nombre, apellido1, apellido2, correo, contrasenia, telefono, genero, rol) FROM stdin;
    public          postgres    false    215   �0       �           0    0    carrito_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.carrito_id_seq', 1, false);
          public          postgres    false    219            �           0    0    compras_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.compras_id_seq', 1, false);
          public          postgres    false    221            �           0    0    pedidos_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.pedidos_id_seq', 1, false);
          public          postgres    false    224            �           0    0    producto_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.producto_id_seq', 12, true);
          public          postgres    false    217            �           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 42, true);
          public          postgres    false    216            @           2606    40969    carrito carrito_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.carrito
    ADD CONSTRAINT carrito_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.carrito DROP CONSTRAINT carrito_pkey;
       public            postgres    false    220            B           2606    40979    compras compras_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.compras
    ADD CONSTRAINT compras_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.compras DROP CONSTRAINT compras_pkey;
       public            postgres    false    222            F           2606    41035    pedidos pedidos_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.pedidos DROP CONSTRAINT pedidos_pkey;
       public            postgres    false    225            >           2606    16428    producto producto_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.producto DROP CONSTRAINT producto_pkey;
       public            postgres    false    218            D           2606    41017    productos productos_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    223            :           2606    16406    usuarios usuarios_correo_key 
   CONSTRAINT     Y   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_correo_key UNIQUE (correo);
 F   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_correo_key;
       public            postgres    false    215            <           2606    16408    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public            postgres    false    215            �      x������ � �      �      x������ � �      �      x������ � �      �   �   x�U�K�0E�ﭢ+ -X�Sq��N�H��3|�z\���3>�����[5���$r�z�&P���%%�p��[q�,TsJl&~cE��3�$v�Pҝ�Oz ��tEsq�CP�1�Ay뼃lA��3�c8�[���h��8���na=5[7�e���K��K��o �J]      �   :  x�}��r�6���S w��dɹ��d�[2�6=��W\@ P��69����/�?l1�f4#���������CW���1 ���/AI`��}k)&��r��Kk�Fy�[���v�?��4�ryĦ���hxo��롱�\YQ�c�.��s��l��ʤ����ļw�B�U�*�b�[g}�j�� xP{�E���)Ǘ�ӧ�QIA(s�R�ײ��Z��m��p�v�H+S��ě�5Q�������ib����|���7��,�;���oi�2v(���V2W�8WX��MY�ޮ˪*D���b��כ�_-E��֖�_�Jc�����'~ Jyٮ��I�`pHB錕�^eOQu��|R�����ç��^��w�H�5x�^�n�ރ�����8x�1X��2����f����J���%u��h@)�8J��RaI�5 h7��.���"����+E�HRC�$y��m�6SU��gآ(��
}�z��B�U�qC�F5HN����.J�I%�����6/v��%�"�eXz<Sq3������Zr�};����L)C�xԿ9��-�O؂9��$���2�xDq�!���$1��?�A�"���N�����[v���(��Q�ۣ�B��V'+���0��'PFiߊ,C��v�un!D?�>I�u^T9��,�1I;m&�ĸ����j�۱�@]O;���{�R����LQ�?/noA��sv��{LGk4v���y�n��K���2v��p��X19j½}���½}���i����M�-9$���oB�\��?^��]I�]j��fzYw��#����
>1�      �     x���MN1F�5�A.���C���Hl�)�U3��;D�e�Sp��A���ػo����k�Yym3\�Z��1\=�]��=Fs��x��<�����5�썣h��QV55���!I+�7c�*����=F�����q���l|��=|�i�o�����%09�[� )�bր\�4X,Fy/���䐃Qt�!���~x�\��cON��6�Mr0�73L,�w����n���=�=�lS*6�*�s�ڊ�������Pt��E��x�_y��c�Nv�7Fll���R3ŀƖ���Q%�=6��&�`��ℬ|��Q���R�������3��i^F�O�,��}�>@��v?��cJN�f��U�����J�L�t�J�.��o���r���ŉz����e�Go��lĠ�[�Xbf�$�����}њ�y�sN�<,C����0�Ӈ�ZD���`�)�Nc�{�ns���������wFD:4���_��*��^�y�W��>�l6�şB     
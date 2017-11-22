PGDMP     
    $    	        
    u           6921    9.6.5    10.0 �    �	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �	           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �	           1262    17354    6921    DATABASE     �   CREATE DATABASE "6921" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Chile.1252' LC_CTYPE = 'Spanish_Chile.1252';
    DROP DATABASE "6921";
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �	           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12387    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �	           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    17355    rel_tEmpleados_tBonos    TABLE     �   CREATE TABLE "rel_tEmpleados_tBonos" (
    "Rut" character varying(15) NOT NULL,
    "id_Bono" integer NOT NULL,
    "Monto" integer
);
 +   DROP TABLE public."rel_tEmpleados_tBonos";
       public         postgres    false    3            �            1259    17358    tBonos    TABLE     �   CREATE TABLE "tBonos" (
    "Bono" character varying(50),
    "Imponible" boolean NOT NULL,
    "Activo" boolean NOT NULL,
    "id_Bono" integer NOT NULL
);
    DROP TABLE public."tBonos";
       public         postgres    false    3            �            1259    17361 
   tEmpleados    TABLE     �  CREATE TABLE "tEmpleados" (
    "Nombre" character varying(70),
    "F_nacimiento" date,
    "F_ingreso" date,
    "id_Contrato" integer,
    "Sueldo_base" integer,
    "id_AFP" integer,
    "Rut" character varying(9) NOT NULL,
    "id_ISAPRE" integer,
    "N_horas" smallint,
    "Paga_por_hora" integer,
    "Activo" boolean DEFAULT true NOT NULL,
    "Cargas" smallint DEFAULT 0
);
     DROP TABLE public."tEmpleados";
       public         postgres    false    3            �            1259    17366    jkljkl    VIEW     �  CREATE VIEW jkljkl AS
 SELECT "tEmpleados"."Rut",
    "tBonos"."Bono",
    "tBonos"."Activo",
    "tBonos"."id_Bono",
    "tBonos"."Imponible"
   FROM (("tBonos"
     JOIN "rel_tEmpleados_tBonos" ON (("tBonos"."id_Bono" = "rel_tEmpleados_tBonos"."id_Bono")))
     JOIN "tEmpleados" ON ((("rel_tEmpleados_tBonos"."Rut")::text = ("tEmpleados"."Rut")::text)))
  WHERE (("tEmpleados"."Rut")::bpchar = '094432855'::bpchar);
    DROP VIEW public.jkljkl;
       public       postgres    false    185    185    186    186    186    186    187    3            �            1259    17371 
   migrations    TABLE     �   CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    3            �            1259    17374    migrations_id_seq    SEQUENCE     s   CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    3    189            �	           0    0    migrations_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;
            public       postgres    false    190            �            1259    17376    password_resets    TABLE     �   CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false    3            �            1259    17382    rel_alumno_curso    TABLE     b   CREATE TABLE rel_alumno_curso (
    rut character varying(20),
    curso character varying(10)
);
 $   DROP TABLE public.rel_alumno_curso;
       public         postgres    false    3            �            1259    17385    rel_tAlumnos_tApoderados    TABLE     �   CREATE TABLE "rel_tAlumnos_tApoderados" (
    "Rut_apo" character varying(15) NOT NULL,
    "Rut_alu" character varying(15) NOT NULL,
    "Relacion" character varying(30)
);
 .   DROP TABLE public."rel_tAlumnos_tApoderados";
       public         postgres    false    3            �            1259    17388    rel_tAlumnos_tHermanos    TABLE     w   CREATE TABLE "rel_tAlumnos_tHermanos" (
    "Rut" character varying(15) NOT NULL,
    "id_Hermano" integer NOT NULL
);
 ,   DROP TABLE public."rel_tAlumnos_tHermanos";
       public         postgres    false    3            �            1259    17391    rel_tAlumnos_tPadres    TABLE     �   CREATE TABLE "rel_tAlumnos_tPadres" (
    "Rut_alu" character varying(15) NOT NULL,
    "Rut_padre" character varying(15) NOT NULL,
    "Parentesco" character varying(20)
);
 *   DROP TABLE public."rel_tAlumnos_tPadres";
       public         postgres    false    3            �            1259    17597    rel_tEmpleado_Curso    TABLE     }   CREATE TABLE "rel_tEmpleado_Curso" (
    "Rut" character varying(20) NOT NULL,
    "Curso" character varying(10) NOT NULL
);
 )   DROP TABLE public."rel_tEmpleado_Curso";
       public         postgres    false    3            �            1259    17394    rel_tEmpleados_tAsignatura    TABLE     r   CREATE TABLE "rel_tEmpleados_tAsignatura" (
    rut character varying(20),
    code_curso character varying(6)
);
 0   DROP TABLE public."rel_tEmpleados_tAsignatura";
       public         postgres    false    3            �            1259    17397    rel_tEmpleados_tCargos    TABLE     u   CREATE TABLE "rel_tEmpleados_tCargos" (
    "Rut" character varying(15) NOT NULL,
    "id_Cargo" integer NOT NULL
);
 ,   DROP TABLE public."rel_tEmpleados_tCargos";
       public         postgres    false    3            �            1259    17400    rel_tEmpleados_tDescuentos    TABLE     �   CREATE TABLE "rel_tEmpleados_tDescuentos" (
    "id_Descuento" integer NOT NULL,
    "Monto" integer,
    "Rut" character varying(15) NOT NULL
);
 0   DROP TABLE public."rel_tEmpleados_tDescuentos";
       public         postgres    false    3            �            1259    17403    rel_tEmpleados_tGastos_extra    TABLE     �   CREATE TABLE "rel_tEmpleados_tGastos_extra" (
    "Rut" character varying(15) NOT NULL,
    "id_Gasto" integer NOT NULL,
    "Info" character varying(60),
    "Tasa_gasto" real,
    "Monto" integer
);
 2   DROP TABLE public."rel_tEmpleados_tGastos_extra";
       public         postgres    false    3            �            1259    17406    tAFP    TABLE     �   CREATE TABLE "tAFP" (
    "AFP" character varying(50),
    "Tasa" real,
    "SIS" real,
    "Activo" boolean DEFAULT true NOT NULL,
    "id_AFP" integer NOT NULL
);
    DROP TABLE public."tAFP";
       public         postgres    false    3            �            1259    17410    tAFP_id_AFP_seq    SEQUENCE     s   CREATE SEQUENCE "tAFP_id_AFP_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."tAFP_id_AFP_seq";
       public       postgres    false    200    3            �	           0    0    tAFP_id_AFP_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE "tAFP_id_AFP_seq" OWNED BY "tAFP"."id_AFP";
            public       postgres    false    201            �            1259    17412    tAlumnos    TABLE     �  CREATE TABLE "tAlumnos" (
    "Rut" character varying(15) NOT NULL,
    "Nombre" character varying(70),
    "F_nacimiento" date,
    "F_ingreso" date,
    "Direccion" character varying(100),
    "Comuna" character varying(40),
    "Curso" character varying(20),
    "Curso_anterior" character varying(20),
    "Establecimiento_ant" character varying(70),
    "Repitente" boolean,
    "Cursos_repetidos" smallint,
    "Ingles" boolean,
    "Activo" boolean
);
    DROP TABLE public."tAlumnos";
       public         postgres    false    3            �	           0    0    COLUMN "tAlumnos"."Nombre"    COMMENT     .   COMMENT ON COLUMN "tAlumnos"."Nombre" IS '
';
            public       postgres    false    202            �	           0    0    COLUMN "tAlumnos"."Direccion"    COMMENT     1   COMMENT ON COLUMN "tAlumnos"."Direccion" IS '
';
            public       postgres    false    202            �            1259    17415    tApoderados    TABLE     �   CREATE TABLE "tApoderados" (
    "Rut" character varying(15) NOT NULL,
    "Nombre" character varying(70),
    "Email" character varying(40),
    "Fono" character varying(20),
    "Activo" boolean
);
 !   DROP TABLE public."tApoderados";
       public         postgres    false    3            �            1259    17418    tAsignatura    TABLE     f   CREATE TABLE "tAsignatura" (
    code_curso character varying(6),
    nombre character varying(30)
);
 !   DROP TABLE public."tAsignatura";
       public         postgres    false    3            �            1259    17421    tBonos_id_Bono_seq    SEQUENCE     v   CREATE SEQUENCE "tBonos_id_Bono_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public."tBonos_id_Bono_seq";
       public       postgres    false    3    186            �	           0    0    tBonos_id_Bono_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE "tBonos_id_Bono_seq" OWNED BY "tBonos"."id_Bono";
            public       postgres    false    205            �            1259    17423    tCargos    TABLE     _   CREATE TABLE "tCargos" (
    "Cargo" character varying(50),
    "id_Cargo" integer NOT NULL
);
    DROP TABLE public."tCargos";
       public         postgres    false    3            �            1259    17426    tCargos_id_Cargo_seq    SEQUENCE     x   CREATE SEQUENCE "tCargos_id_Cargo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."tCargos_id_Cargo_seq";
       public       postgres    false    206    3            �	           0    0    tCargos_id_Cargo_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE "tCargos_id_Cargo_seq" OWNED BY "tCargos"."id_Cargo";
            public       postgres    false    207            �            1259    17428    tComportamiento    TABLE     �   CREATE TABLE "tComportamiento" (
    "Rut" character varying(15) NOT NULL,
    "id_Comentario" integer NOT NULL,
    "Comentario" character varying(500),
    "Tipo" character varying(10),
    "Autor" character varying(50),
    "Fecha" date
);
 %   DROP TABLE public."tComportamiento";
       public         postgres    false    3            �            1259    17434 !   tComportamiento_id_Comentario_seq    SEQUENCE     �   CREATE SEQUENCE "tComportamiento_id_Comentario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public."tComportamiento_id_Comentario_seq";
       public       postgres    false    3    208            �	           0    0 !   tComportamiento_id_Comentario_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE "tComportamiento_id_Comentario_seq" OWNED BY "tComportamiento"."id_Comentario";
            public       postgres    false    209            �            1259    17436 
   tContratos    TABLE     �   CREATE TABLE "tContratos" (
    "Contrato" character varying(20),
    "id_Contrato" integer NOT NULL,
    "Tasa_seguro_cesantia" real
);
     DROP TABLE public."tContratos";
       public         postgres    false    3            �            1259    17439    tContratos_id_Contrato_seq    SEQUENCE     ~   CREATE SEQUENCE "tContratos_id_Contrato_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."tContratos_id_Contrato_seq";
       public       postgres    false    3    210            �	           0    0    tContratos_id_Contrato_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE "tContratos_id_Contrato_seq" OWNED BY "tContratos"."id_Contrato";
            public       postgres    false    211            �            1259    17441    tDescuentos    TABLE     �   CREATE TABLE "tDescuentos" (
    "Descuento" character varying(30),
    "Activo" boolean DEFAULT true NOT NULL,
    "id_Descuento" integer NOT NULL,
    "Tipo" character varying(6)
);
 !   DROP TABLE public."tDescuentos";
       public         postgres    false    3            �            1259    17445    tDescuentos_id_Descuento_seq    SEQUENCE     �   CREATE SEQUENCE "tDescuentos_id_Descuento_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public."tDescuentos_id_Descuento_seq";
       public       postgres    false    3    212            �	           0    0    tDescuentos_id_Descuento_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE "tDescuentos_id_Descuento_seq" OWNED BY "tDescuentos"."id_Descuento";
            public       postgres    false    213            �            1259    17447    tEmpleado_Fono    TABLE     }   CREATE TABLE "tEmpleado_Fono" (
    "Rut" character varying(15) NOT NULL,
    "N_telefono" character varying(18) NOT NULL
);
 $   DROP TABLE public."tEmpleado_Fono";
       public         postgres    false    3            �            1259    17450    tGastos_extra    TABLE     l   CREATE TABLE "tGastos_extra" (
    "id_Gasto" integer NOT NULL,
    "Nombre_gasto" character varying(50)
);
 #   DROP TABLE public."tGastos_extra";
       public         postgres    false    3            �            1259    17453    tGastos_extra_id_Gasto_seq    SEQUENCE     ~   CREATE SEQUENCE "tGastos_extra_id_Gasto_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."tGastos_extra_id_Gasto_seq";
       public       postgres    false    3    215            �	           0    0    tGastos_extra_id_Gasto_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE "tGastos_extra_id_Gasto_seq" OWNED BY "tGastos_extra"."id_Gasto";
            public       postgres    false    216            �            1259    17455 	   tHermanos    TABLE     �   CREATE TABLE "tHermanos" (
    "id_Hermano" integer NOT NULL,
    "Nombre" character varying(70),
    "F_nacimiento" date,
    "Ocupacion" character varying(50),
    "Direccion" character varying(50)
);
    DROP TABLE public."tHermanos";
       public         postgres    false    3            �            1259    17458    tHermanos_id_Hermano_seq    SEQUENCE     |   CREATE SEQUENCE "tHermanos_id_Hermano_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."tHermanos_id_Hermano_seq";
       public       postgres    false    3    217            �	           0    0    tHermanos_id_Hermano_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE "tHermanos_id_Hermano_seq" OWNED BY "tHermanos"."id_Hermano";
            public       postgres    false    218            �            1259    17460    tISAPRE    TABLE     �   CREATE TABLE "tISAPRE" (
    "ISAPRE" character varying(30),
    "Tasa" real,
    "Activo" boolean DEFAULT true NOT NULL,
    "id_ISAPRE" integer NOT NULL
);
    DROP TABLE public."tISAPRE";
       public         postgres    false    3            �            1259    17464    tISAPRE_id_ISAPRE_seq    SEQUENCE     y   CREATE SEQUENCE "tISAPRE_id_ISAPRE_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public."tISAPRE_id_ISAPRE_seq";
       public       postgres    false    219    3            �	           0    0    tISAPRE_id_ISAPRE_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE "tISAPRE_id_ISAPRE_seq" OWNED BY "tISAPRE"."id_ISAPRE";
            public       postgres    false    220            �            1259    17466 	   tImpuesto    TABLE     �   CREATE TABLE "tImpuesto" (
    "id_Impuesto" integer NOT NULL,
    "fDesde" real,
    "fHasta" real,
    "Factor" real,
    "nDesde" integer,
    "nHasta" integer,
    "fRebaja" real,
    "nRebaja" integer
);
    DROP TABLE public."tImpuesto";
       public         postgres    false    3            �            1259    17469    tImpuesto_id_Impuesto_seq    SEQUENCE     }   CREATE SEQUENCE "tImpuesto_id_Impuesto_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public."tImpuesto_id_Impuesto_seq";
       public       postgres    false    221    3            �	           0    0    tImpuesto_id_Impuesto_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE "tImpuesto_id_Impuesto_seq" OWNED BY "tImpuesto"."id_Impuesto";
            public       postgres    false    222            �            1259    17471    tInventario    TABLE     �  CREATE TABLE "tInventario" (
    "Serial" character varying(20),
    id integer NOT NULL,
    "Tipo" character varying(50),
    "Sector" character varying(60),
    "Subvencion" character varying(50),
    "N_Boleta" character varying(70),
    "F_factura" date,
    "Proveedor" character varying(70),
    "Rut_Proveedor" character varying(20),
    "Descripcion" character varying(200),
    "Estado" character varying(50),
    "Activo" boolean DEFAULT true NOT NULL
);
 !   DROP TABLE public."tInventario";
       public         postgres    false    3            �            1259    17478    tInventario_id_seq    SEQUENCE     v   CREATE SEQUENCE "tInventario_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public."tInventario_id_seq";
       public       postgres    false    3    223            �	           0    0    tInventario_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE "tInventario_id_seq" OWNED BY "tInventario".id;
            public       postgres    false    224            �            1259    17480 
   tLicencias    TABLE     Y  CREATE TABLE "tLicencias" (
    "Rut" character varying(15) NOT NULL,
    "id_Licencia" integer NOT NULL,
    "Descuenta" boolean,
    "Dias" integer,
    "F_inicio" date,
    "F_final" date,
    "Nombre_licencia" character varying(50),
    "Activo" boolean DEFAULT true NOT NULL,
    "Ultimo_val" integer,
    "Motivo" character varying(70)
);
     DROP TABLE public."tLicencias";
       public         postgres    false    3            �            1259    17484    tLicencias_id_Licencia_seq    SEQUENCE     ~   CREATE SEQUENCE "tLicencias_id_Licencia_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."tLicencias_id_Licencia_seq";
       public       postgres    false    225    3            �	           0    0    tLicencias_id_Licencia_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE "tLicencias_id_Licencia_seq" OWNED BY "tLicencias"."id_Licencia";
            public       postgres    false    226            �            1259    17486    tNotas    TABLE     q   CREATE TABLE "tNotas" (
    rut_alu character varying(20),
    code_curso character varying(6),
    nota real
);
    DROP TABLE public."tNotas";
       public         postgres    false    3            �            1259    17489    tPadres    TABLE     .  CREATE TABLE "tPadres" (
    "Rut" character varying(15) NOT NULL,
    "Nombre" character varying(70),
    "F_nacimiento" date,
    "Fono" character varying(15),
    "Email" character varying(50),
    "Vive_c_alu" boolean,
    "Estudios" character varying(20),
    "Ocupacion" character varying(50)
);
    DROP TABLE public."tPadres";
       public         postgres    false    3            �            1259    17492    tPago    TABLE     �   CREATE TABLE "tPago" (
    "Rut_alu" character varying(15) NOT NULL,
    "Rut_apo" character varying(15) NOT NULL,
    "Fecha" date,
    "Cantidad" integer,
    "Tipo" character varying(20)
);
    DROP TABLE public."tPago";
       public         postgres    false    3            �            1259    17495 
   tPrestamos    TABLE     �   CREATE TABLE "tPrestamos" (
    "Rut" character varying(15) NOT NULL,
    "id_Prestamo" integer NOT NULL,
    "Nombre" character varying(70),
    "F_inicio" date,
    "F_final" date,
    "Monto" integer,
    "Activo" boolean DEFAULT true NOT NULL
);
     DROP TABLE public."tPrestamos";
       public         postgres    false    3            �            1259    17499    tPrestamos_id_Prestamo_seq    SEQUENCE     ~   CREATE SEQUENCE "tPrestamos_id_Prestamo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."tPrestamos_id_Prestamo_seq";
       public       postgres    false    3    230            �	           0    0    tPrestamos_id_Prestamo_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE "tPrestamos_id_Prestamo_seq" OWNED BY "tPrestamos"."id_Prestamo";
            public       postgres    false    231            �            1259    17501    tSalud    TABLE       CREATE TABLE "tSalud" (
    "Rut" character varying(15) NOT NULL,
    "Fono" character varying(15),
    "Email" character varying(50),
    "Alergia" boolean,
    "p_Salud" boolean,
    "Antc_Alergia" character varying(500),
    "Antc_Salud" character varying(500)
);
    DROP TABLE public."tSalud";
       public         postgres    false    3            �            1259    17507 	   tUsuarios    TABLE     �   CREATE TABLE "tUsuarios" (
    "Usuario" character varying(30) NOT NULL,
    "Password" character varying(255),
    "Tipo" character varying(15)
);
    DROP TABLE public."tUsuarios";
       public         postgres    false    3            �            1259    17510    users    TABLE     d  CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    rol character varying(1) DEFAULT 0
);
    DROP TABLE public.users;
       public         postgres    false    3            �            1259    17517    users_id_seq    SEQUENCE     n   CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    3    234            �	           0    0    users_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE users_id_seq OWNED BY users.id;
            public       postgres    false    235            �           2604    17519    migrations id    DEFAULT     `   ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    190    189            �           2604    17520    tAFP id_AFP    DEFAULT     b   ALTER TABLE ONLY "tAFP" ALTER COLUMN "id_AFP" SET DEFAULT nextval('"tAFP_id_AFP_seq"'::regclass);
 >   ALTER TABLE public."tAFP" ALTER COLUMN "id_AFP" DROP DEFAULT;
       public       postgres    false    201    200            �           2604    17521    tBonos id_Bono    DEFAULT     h   ALTER TABLE ONLY "tBonos" ALTER COLUMN "id_Bono" SET DEFAULT nextval('"tBonos_id_Bono_seq"'::regclass);
 A   ALTER TABLE public."tBonos" ALTER COLUMN "id_Bono" DROP DEFAULT;
       public       postgres    false    205    186            �           2604    17522    tCargos id_Cargo    DEFAULT     l   ALTER TABLE ONLY "tCargos" ALTER COLUMN "id_Cargo" SET DEFAULT nextval('"tCargos_id_Cargo_seq"'::regclass);
 C   ALTER TABLE public."tCargos" ALTER COLUMN "id_Cargo" DROP DEFAULT;
       public       postgres    false    207    206            �           2604    17523    tComportamiento id_Comentario    DEFAULT     �   ALTER TABLE ONLY "tComportamiento" ALTER COLUMN "id_Comentario" SET DEFAULT nextval('"tComportamiento_id_Comentario_seq"'::regclass);
 P   ALTER TABLE public."tComportamiento" ALTER COLUMN "id_Comentario" DROP DEFAULT;
       public       postgres    false    209    208            �           2604    17524    tContratos id_Contrato    DEFAULT     x   ALTER TABLE ONLY "tContratos" ALTER COLUMN "id_Contrato" SET DEFAULT nextval('"tContratos_id_Contrato_seq"'::regclass);
 I   ALTER TABLE public."tContratos" ALTER COLUMN "id_Contrato" DROP DEFAULT;
       public       postgres    false    211    210            �           2604    17525    tDescuentos id_Descuento    DEFAULT     |   ALTER TABLE ONLY "tDescuentos" ALTER COLUMN "id_Descuento" SET DEFAULT nextval('"tDescuentos_id_Descuento_seq"'::regclass);
 K   ALTER TABLE public."tDescuentos" ALTER COLUMN "id_Descuento" DROP DEFAULT;
       public       postgres    false    213    212            �           2604    17526    tGastos_extra id_Gasto    DEFAULT     x   ALTER TABLE ONLY "tGastos_extra" ALTER COLUMN "id_Gasto" SET DEFAULT nextval('"tGastos_extra_id_Gasto_seq"'::regclass);
 I   ALTER TABLE public."tGastos_extra" ALTER COLUMN "id_Gasto" DROP DEFAULT;
       public       postgres    false    216    215            �           2604    17527    tHermanos id_Hermano    DEFAULT     t   ALTER TABLE ONLY "tHermanos" ALTER COLUMN "id_Hermano" SET DEFAULT nextval('"tHermanos_id_Hermano_seq"'::regclass);
 G   ALTER TABLE public."tHermanos" ALTER COLUMN "id_Hermano" DROP DEFAULT;
       public       postgres    false    218    217            �           2604    17528    tISAPRE id_ISAPRE    DEFAULT     n   ALTER TABLE ONLY "tISAPRE" ALTER COLUMN "id_ISAPRE" SET DEFAULT nextval('"tISAPRE_id_ISAPRE_seq"'::regclass);
 D   ALTER TABLE public."tISAPRE" ALTER COLUMN "id_ISAPRE" DROP DEFAULT;
       public       postgres    false    220    219            �           2604    17529    tImpuesto id_Impuesto    DEFAULT     v   ALTER TABLE ONLY "tImpuesto" ALTER COLUMN "id_Impuesto" SET DEFAULT nextval('"tImpuesto_id_Impuesto_seq"'::regclass);
 H   ALTER TABLE public."tImpuesto" ALTER COLUMN "id_Impuesto" DROP DEFAULT;
       public       postgres    false    222    221            �           2604    17530    tInventario id    DEFAULT     f   ALTER TABLE ONLY "tInventario" ALTER COLUMN id SET DEFAULT nextval('"tInventario_id_seq"'::regclass);
 ?   ALTER TABLE public."tInventario" ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    224    223            �           2604    17531    tLicencias id_Licencia    DEFAULT     x   ALTER TABLE ONLY "tLicencias" ALTER COLUMN "id_Licencia" SET DEFAULT nextval('"tLicencias_id_Licencia_seq"'::regclass);
 I   ALTER TABLE public."tLicencias" ALTER COLUMN "id_Licencia" DROP DEFAULT;
       public       postgres    false    226    225            �           2604    17532    tPrestamos id_Prestamo    DEFAULT     x   ALTER TABLE ONLY "tPrestamos" ALTER COLUMN "id_Prestamo" SET DEFAULT nextval('"tPrestamos_id_Prestamo_seq"'::regclass);
 I   ALTER TABLE public."tPrestamos" ALTER COLUMN "id_Prestamo" DROP DEFAULT;
       public       postgres    false    231    230            �           2604    17533    users id    DEFAULT     V   ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    235    234            S	          0    17371 
   migrations 
   TABLE DATA               3   COPY migrations (id, migration, batch) FROM stdin;
    public       postgres    false    189   -�       U	          0    17376    password_resets 
   TABLE DATA               <   COPY password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    191   ��       V	          0    17382    rel_alumno_curso 
   TABLE DATA               /   COPY rel_alumno_curso (rut, curso) FROM stdin;
    public       postgres    false    192   ��       W	          0    17385    rel_tAlumnos_tApoderados 
   TABLE DATA               O   COPY "rel_tAlumnos_tApoderados" ("Rut_apo", "Rut_alu", "Relacion") FROM stdin;
    public       postgres    false    193   ��       X	          0    17388    rel_tAlumnos_tHermanos 
   TABLE DATA               @   COPY "rel_tAlumnos_tHermanos" ("Rut", "id_Hermano") FROM stdin;
    public       postgres    false    194   8�       Y	          0    17391    rel_tAlumnos_tPadres 
   TABLE DATA               O   COPY "rel_tAlumnos_tPadres" ("Rut_alu", "Rut_padre", "Parentesco") FROM stdin;
    public       postgres    false    195   s�       �	          0    17597    rel_tEmpleado_Curso 
   TABLE DATA               8   COPY "rel_tEmpleado_Curso" ("Rut", "Curso") FROM stdin;
    public       postgres    false    236   ��       Z	          0    17394    rel_tEmpleados_tAsignatura 
   TABLE DATA               @   COPY "rel_tEmpleados_tAsignatura" (rut, code_curso) FROM stdin;
    public       postgres    false    196   �       P	          0    17355    rel_tEmpleados_tBonos 
   TABLE DATA               E   COPY "rel_tEmpleados_tBonos" ("Rut", "id_Bono", "Monto") FROM stdin;
    public       postgres    false    185   I�       [	          0    17397    rel_tEmpleados_tCargos 
   TABLE DATA               >   COPY "rel_tEmpleados_tCargos" ("Rut", "id_Cargo") FROM stdin;
    public       postgres    false    197   D�       \	          0    17400    rel_tEmpleados_tDescuentos 
   TABLE DATA               O   COPY "rel_tEmpleados_tDescuentos" ("id_Descuento", "Monto", "Rut") FROM stdin;
    public       postgres    false    198   ��       ]	          0    17403    rel_tEmpleados_tGastos_extra 
   TABLE DATA               c   COPY "rel_tEmpleados_tGastos_extra" ("Rut", "id_Gasto", "Info", "Tasa_gasto", "Monto") FROM stdin;
    public       postgres    false    199   �       ^	          0    17406    tAFP 
   TABLE DATA               C   COPY "tAFP" ("AFP", "Tasa", "SIS", "Activo", "id_AFP") FROM stdin;
    public       postgres    false    200   S�       `	          0    17412    tAlumnos 
   TABLE DATA               �   COPY "tAlumnos" ("Rut", "Nombre", "F_nacimiento", "F_ingreso", "Direccion", "Comuna", "Curso", "Curso_anterior", "Establecimiento_ant", "Repitente", "Cursos_repetidos", "Ingles", "Activo") FROM stdin;
    public       postgres    false    202   ��       a	          0    17415    tApoderados 
   TABLE DATA               L   COPY "tApoderados" ("Rut", "Nombre", "Email", "Fono", "Activo") FROM stdin;
    public       postgres    false    203   ��       b	          0    17418    tAsignatura 
   TABLE DATA               4   COPY "tAsignatura" (code_curso, nombre) FROM stdin;
    public       postgres    false    204   I�       Q	          0    17358    tBonos 
   TABLE DATA               E   COPY "tBonos" ("Bono", "Imponible", "Activo", "id_Bono") FROM stdin;
    public       postgres    false    186   d�       d	          0    17423    tCargos 
   TABLE DATA               1   COPY "tCargos" ("Cargo", "id_Cargo") FROM stdin;
    public       postgres    false    206   ��       f	          0    17428    tComportamiento 
   TABLE DATA               d   COPY "tComportamiento" ("Rut", "id_Comentario", "Comentario", "Tipo", "Autor", "Fecha") FROM stdin;
    public       postgres    false    208   {�       h	          0    17436 
   tContratos 
   TABLE DATA               R   COPY "tContratos" ("Contrato", "id_Contrato", "Tasa_seguro_cesantia") FROM stdin;
    public       postgres    false    210   ��       j	          0    17441    tDescuentos 
   TABLE DATA               O   COPY "tDescuentos" ("Descuento", "Activo", "id_Descuento", "Tipo") FROM stdin;
    public       postgres    false    212   ��       l	          0    17447    tEmpleado_Fono 
   TABLE DATA               8   COPY "tEmpleado_Fono" ("Rut", "N_telefono") FROM stdin;
    public       postgres    false    214   ��       R	          0    17361 
   tEmpleados 
   TABLE DATA               �   COPY "tEmpleados" ("Nombre", "F_nacimiento", "F_ingreso", "id_Contrato", "Sueldo_base", "id_AFP", "Rut", "id_ISAPRE", "N_horas", "Paga_por_hora", "Activo", "Cargas") FROM stdin;
    public       postgres    false    187   S�       m	          0    17450    tGastos_extra 
   TABLE DATA               >   COPY "tGastos_extra" ("id_Gasto", "Nombre_gasto") FROM stdin;
    public       postgres    false    215   �       o	          0    17455 	   tHermanos 
   TABLE DATA               `   COPY "tHermanos" ("id_Hermano", "Nombre", "F_nacimiento", "Ocupacion", "Direccion") FROM stdin;
    public       postgres    false    217   ��       q	          0    17460    tISAPRE 
   TABLE DATA               E   COPY "tISAPRE" ("ISAPRE", "Tasa", "Activo", "id_ISAPRE") FROM stdin;
    public       postgres    false    219   H�       s	          0    17466 	   tImpuesto 
   TABLE DATA               u   COPY "tImpuesto" ("id_Impuesto", "fDesde", "fHasta", "Factor", "nDesde", "nHasta", "fRebaja", "nRebaja") FROM stdin;
    public       postgres    false    221   ��       u	          0    17471    tInventario 
   TABLE DATA               �   COPY "tInventario" ("Serial", id, "Tipo", "Sector", "Subvencion", "N_Boleta", "F_factura", "Proveedor", "Rut_Proveedor", "Descripcion", "Estado", "Activo") FROM stdin;
    public       postgres    false    223   ��       w	          0    17480 
   tLicencias 
   TABLE DATA               �   COPY "tLicencias" ("Rut", "id_Licencia", "Descuenta", "Dias", "F_inicio", "F_final", "Nombre_licencia", "Activo", "Ultimo_val", "Motivo") FROM stdin;
    public       postgres    false    225   �       y	          0    17486    tNotas 
   TABLE DATA               6   COPY "tNotas" (rut_alu, code_curso, nota) FROM stdin;
    public       postgres    false    227   r�       z	          0    17489    tPadres 
   TABLE DATA               u   COPY "tPadres" ("Rut", "Nombre", "F_nacimiento", "Fono", "Email", "Vive_c_alu", "Estudios", "Ocupacion") FROM stdin;
    public       postgres    false    228   ��       {	          0    17492    tPago 
   TABLE DATA               M   COPY "tPago" ("Rut_alu", "Rut_apo", "Fecha", "Cantidad", "Tipo") FROM stdin;
    public       postgres    false    229   
�       |	          0    17495 
   tPrestamos 
   TABLE DATA               i   COPY "tPrestamos" ("Rut", "id_Prestamo", "Nombre", "F_inicio", "F_final", "Monto", "Activo") FROM stdin;
    public       postgres    false    230   '�       ~	          0    17501    tSalud 
   TABLE DATA               g   COPY "tSalud" ("Rut", "Fono", "Email", "Alergia", "p_Salud", "Antc_Alergia", "Antc_Salud") FROM stdin;
    public       postgres    false    232   q�       	          0    17507 	   tUsuarios 
   TABLE DATA               =   COPY "tUsuarios" ("Usuario", "Password", "Tipo") FROM stdin;
    public       postgres    false    233   k�       �	          0    17510    users 
   TABLE DATA               `   COPY users (id, name, email, password, remember_token, created_at, updated_at, rol) FROM stdin;
    public       postgres    false    234   ��       �	           0    0    migrations_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('migrations_id_seq', 2, true);
            public       postgres    false    190            �	           0    0    tAFP_id_AFP_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('"tAFP_id_AFP_seq"', 7, true);
            public       postgres    false    201            �	           0    0    tBonos_id_Bono_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('"tBonos_id_Bono_seq"', 26, true);
            public       postgres    false    205            �	           0    0    tCargos_id_Cargo_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('"tCargos_id_Cargo_seq"', 14, true);
            public       postgres    false    207            �	           0    0 !   tComportamiento_id_Comentario_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('"tComportamiento_id_Comentario_seq"', 1, false);
            public       postgres    false    209            �	           0    0    tContratos_id_Contrato_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('"tContratos_id_Contrato_seq"', 2, true);
            public       postgres    false    211            �	           0    0    tDescuentos_id_Descuento_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('"tDescuentos_id_Descuento_seq"', 15, true);
            public       postgres    false    213            �	           0    0    tGastos_extra_id_Gasto_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('"tGastos_extra_id_Gasto_seq"', 8, true);
            public       postgres    false    216            �	           0    0    tHermanos_id_Hermano_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('"tHermanos_id_Hermano_seq"', 4, true);
            public       postgres    false    218            �	           0    0    tISAPRE_id_ISAPRE_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('"tISAPRE_id_ISAPRE_seq"', 13, true);
            public       postgres    false    220            �	           0    0    tImpuesto_id_Impuesto_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('"tImpuesto_id_Impuesto_seq"', 8, true);
            public       postgres    false    222            �	           0    0    tInventario_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('"tInventario_id_seq"', 5, true);
            public       postgres    false    224            �	           0    0    tLicencias_id_Licencia_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('"tLicencias_id_Licencia_seq"', 2, true);
            public       postgres    false    226            �	           0    0    tPrestamos_id_Prestamo_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('"tPrestamos_id_Prestamo_seq"', 1, true);
            public       postgres    false    231            �	           0    0    users_id_seq    SEQUENCE SET     3   SELECT pg_catalog.setval('users_id_seq', 8, true);
            public       postgres    false    235            �           2606    17535    migrations migrations_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    189            �           2606    17537 8   rel_tEmpleados_tDescuentos pk_rel_tEmpleados_tDescuentos 
   CONSTRAINT     �   ALTER TABLE ONLY "rel_tEmpleados_tDescuentos"
    ADD CONSTRAINT "pk_rel_tEmpleados_tDescuentos" PRIMARY KEY ("Rut", "id_Descuento");
 f   ALTER TABLE ONLY public."rel_tEmpleados_tDescuentos" DROP CONSTRAINT "pk_rel_tEmpleados_tDescuentos";
       public         postgres    false    198    198            �           2606    17539 4   rel_tAlumnos_tApoderados rel_tAlumno_tApoderado_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY "rel_tAlumnos_tApoderados"
    ADD CONSTRAINT "rel_tAlumno_tApoderado_pkey" PRIMARY KEY ("Rut_apo", "Rut_alu");
 b   ALTER TABLE ONLY public."rel_tAlumnos_tApoderados" DROP CONSTRAINT "rel_tAlumno_tApoderado_pkey";
       public         postgres    false    193    193            �           2606    17541 1   rel_tAlumnos_tHermanos rel_tAlumno_tHermanos_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY "rel_tAlumnos_tHermanos"
    ADD CONSTRAINT "rel_tAlumno_tHermanos_pkey" PRIMARY KEY ("Rut", "id_Hermano");
 _   ALTER TABLE ONLY public."rel_tAlumnos_tHermanos" DROP CONSTRAINT "rel_tAlumno_tHermanos_pkey";
       public         postgres    false    194    194            �           2606    17543 -   rel_tAlumnos_tPadres rel_tAlumno_tPadres_pkey 
   CONSTRAINT     |   ALTER TABLE ONLY "rel_tAlumnos_tPadres"
    ADD CONSTRAINT "rel_tAlumno_tPadres_pkey" PRIMARY KEY ("Rut_alu", "Rut_padre");
 [   ALTER TABLE ONLY public."rel_tAlumnos_tPadres" DROP CONSTRAINT "rel_tAlumno_tPadres_pkey";
       public         postgres    false    195    195            �           2606    17601 ,   rel_tEmpleado_Curso rel_tEmpleado_Curso_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY "rel_tEmpleado_Curso"
    ADD CONSTRAINT "rel_tEmpleado_Curso_pkey" PRIMARY KEY ("Rut", "Curso");
 Z   ALTER TABLE ONLY public."rel_tEmpleado_Curso" DROP CONSTRAINT "rel_tEmpleado_Curso_pkey";
       public         postgres    false    236    236            �           2606    17545 /   rel_tEmpleados_tBonos rel_tEmpleados_tBono_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY "rel_tEmpleados_tBonos"
    ADD CONSTRAINT "rel_tEmpleados_tBono_pkey" PRIMARY KEY ("Rut", "id_Bono");
 ]   ALTER TABLE ONLY public."rel_tEmpleados_tBonos" DROP CONSTRAINT "rel_tEmpleados_tBono_pkey";
       public         postgres    false    185    185            �           2606    17547 0   rel_tEmpleados_tCargos rel_tEmpleados_tCargos_pk 
   CONSTRAINT     z   ALTER TABLE ONLY "rel_tEmpleados_tCargos"
    ADD CONSTRAINT "rel_tEmpleados_tCargos_pk" PRIMARY KEY ("Rut", "id_Cargo");
 ^   ALTER TABLE ONLY public."rel_tEmpleados_tCargos" DROP CONSTRAINT "rel_tEmpleados_tCargos_pk";
       public         postgres    false    197    197            �           2606    17549 >   rel_tEmpleados_tGastos_extra rel_tEmpleados_tGastos_extra_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY "rel_tEmpleados_tGastos_extra"
    ADD CONSTRAINT "rel_tEmpleados_tGastos_extra_pkey" PRIMARY KEY ("Rut", "id_Gasto");
 l   ALTER TABLE ONLY public."rel_tEmpleados_tGastos_extra" DROP CONSTRAINT "rel_tEmpleados_tGastos_extra_pkey";
       public         postgres    false    199    199            �           2606    17551    tAFP tAFP_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY "tAFP"
    ADD CONSTRAINT "tAFP_pkey" PRIMARY KEY ("id_AFP");
 <   ALTER TABLE ONLY public."tAFP" DROP CONSTRAINT "tAFP_pkey";
       public         postgres    false    200            �           2606    17553    tAlumnos tAlumno_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY "tAlumnos"
    ADD CONSTRAINT "tAlumno_pkey" PRIMARY KEY ("Rut");
 C   ALTER TABLE ONLY public."tAlumnos" DROP CONSTRAINT "tAlumno_pkey";
       public         postgres    false    202            �           2606    17555    tApoderados tApoderado_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY "tApoderados"
    ADD CONSTRAINT "tApoderado_pkey" PRIMARY KEY ("Rut");
 I   ALTER TABLE ONLY public."tApoderados" DROP CONSTRAINT "tApoderado_pkey";
       public         postgres    false    203            �           2606    17557    tBonos tBonos_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY "tBonos"
    ADD CONSTRAINT "tBonos_pkey" PRIMARY KEY ("id_Bono");
 @   ALTER TABLE ONLY public."tBonos" DROP CONSTRAINT "tBonos_pkey";
       public         postgres    false    186            �           2606    17559    tCargos tCargos_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY "tCargos"
    ADD CONSTRAINT "tCargos_pkey" PRIMARY KEY ("id_Cargo");
 B   ALTER TABLE ONLY public."tCargos" DROP CONSTRAINT "tCargos_pkey";
       public         postgres    false    206            �           2606    17561 $   tComportamiento tComportamiento_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY "tComportamiento"
    ADD CONSTRAINT "tComportamiento_pkey" PRIMARY KEY ("Rut", "id_Comentario");
 R   ALTER TABLE ONLY public."tComportamiento" DROP CONSTRAINT "tComportamiento_pkey";
       public         postgres    false    208    208            �           2606    17563    tContratos tContratos_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY "tContratos"
    ADD CONSTRAINT "tContratos_pkey" PRIMARY KEY ("id_Contrato");
 H   ALTER TABLE ONLY public."tContratos" DROP CONSTRAINT "tContratos_pkey";
       public         postgres    false    210            �           2606    17565    tDescuentos tDescuentos_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY "tDescuentos"
    ADD CONSTRAINT "tDescuentos_pkey" PRIMARY KEY ("id_Descuento");
 J   ALTER TABLE ONLY public."tDescuentos" DROP CONSTRAINT "tDescuentos_pkey";
       public         postgres    false    212            �           2606    17567     tEmpleado_Fono tEmpleado_Fono_pk 
   CONSTRAINT     l   ALTER TABLE ONLY "tEmpleado_Fono"
    ADD CONSTRAINT "tEmpleado_Fono_pk" PRIMARY KEY ("Rut", "N_telefono");
 N   ALTER TABLE ONLY public."tEmpleado_Fono" DROP CONSTRAINT "tEmpleado_Fono_pk";
       public         postgres    false    214    214            �           2606    17569    tEmpleados tEmpleados_pk 
   CONSTRAINT     V   ALTER TABLE ONLY "tEmpleados"
    ADD CONSTRAINT "tEmpleados_pk" PRIMARY KEY ("Rut");
 F   ALTER TABLE ONLY public."tEmpleados" DROP CONSTRAINT "tEmpleados_pk";
       public         postgres    false    187            �           2606    17571     tGastos_extra tGastos_extra_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY "tGastos_extra"
    ADD CONSTRAINT "tGastos_extra_pkey" PRIMARY KEY ("id_Gasto");
 N   ALTER TABLE ONLY public."tGastos_extra" DROP CONSTRAINT "tGastos_extra_pkey";
       public         postgres    false    215            �           2606    17573    tHermanos tHermanos_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY "tHermanos"
    ADD CONSTRAINT "tHermanos_pkey" PRIMARY KEY ("id_Hermano");
 F   ALTER TABLE ONLY public."tHermanos" DROP CONSTRAINT "tHermanos_pkey";
       public         postgres    false    217            �           2606    17575    tISAPRE tISAPRE_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY "tISAPRE"
    ADD CONSTRAINT "tISAPRE_pkey" PRIMARY KEY ("id_ISAPRE");
 B   ALTER TABLE ONLY public."tISAPRE" DROP CONSTRAINT "tISAPRE_pkey";
       public         postgres    false    219            �           2606    17577    tImpuesto tImpuesto_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY "tImpuesto"
    ADD CONSTRAINT "tImpuesto_pkey" PRIMARY KEY ("id_Impuesto");
 F   ALTER TABLE ONLY public."tImpuesto" DROP CONSTRAINT "tImpuesto_pkey";
       public         postgres    false    221            �           2606    17579    tInventario tInventario_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY "tInventario"
    ADD CONSTRAINT "tInventario_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."tInventario" DROP CONSTRAINT "tInventario_pkey";
       public         postgres    false    223            �           2606    17581    tLicencias tLicencias_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY "tLicencias"
    ADD CONSTRAINT "tLicencias_pkey" PRIMARY KEY ("Rut", "id_Licencia");
 H   ALTER TABLE ONLY public."tLicencias" DROP CONSTRAINT "tLicencias_pkey";
       public         postgres    false    225    225            �           2606    17583    tPadres tPadres_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY "tPadres"
    ADD CONSTRAINT "tPadres_pkey" PRIMARY KEY ("Rut");
 B   ALTER TABLE ONLY public."tPadres" DROP CONSTRAINT "tPadres_pkey";
       public         postgres    false    228            �           2606    17585    tPago tPago_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY "tPago"
    ADD CONSTRAINT "tPago_pkey" PRIMARY KEY ("Rut_alu", "Rut_apo");
 >   ALTER TABLE ONLY public."tPago" DROP CONSTRAINT "tPago_pkey";
       public         postgres    false    229    229            �           2606    17587    tPrestamos tPrestamos_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY "tPrestamos"
    ADD CONSTRAINT "tPrestamos_pkey" PRIMARY KEY ("Rut", "id_Prestamo");
 H   ALTER TABLE ONLY public."tPrestamos" DROP CONSTRAINT "tPrestamos_pkey";
       public         postgres    false    230    230            �           2606    17589    tSalud tSalud_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY "tSalud"
    ADD CONSTRAINT "tSalud_pkey" PRIMARY KEY ("Rut");
 @   ALTER TABLE ONLY public."tSalud" DROP CONSTRAINT "tSalud_pkey";
       public         postgres    false    232            �           2606    17591    tUsuarios tUsuarios_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY "tUsuarios"
    ADD CONSTRAINT "tUsuarios_pkey" PRIMARY KEY ("Usuario");
 F   ALTER TABLE ONLY public."tUsuarios" DROP CONSTRAINT "tUsuarios_pkey";
       public         postgres    false    233            �           2606    17593    users users_email_unique 
   CONSTRAINT     M   ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    234            �           2606    17595    users users_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    234            S	   H   x�3�4204�74�74�7 ����Ē����Ԣ���Ĥ�TNC.#d��(
����R�R�SKZb���� ]      U	      x������ � �      V	   >   x�3��4�036���q�320�2�8��
8{��puqC�pw	������������� y=�      W	   8   x�34�4�0264�4��̌M,9S�R�-M-M�|scssS3�D� U��      X	   +   x�3��4�036��4�2����̍��L�L8�L�=... ��      Y	   P   x�3��4�036��44375�0�|S�R��d�,#cCS� ���������	�������)P	���������9Ԭ=... ��F      �	   "   x�345260�03�4�K�W�MM������� R�      Z	   4   x�345260�03��q�320�2�8��
8{��puqC�pw	��qqq %�=      P	   �   x�U�Q�� �or�-h�.s�slg�b��W*-����"b
�e�=P�� �|��#jZ�]1'A����TM��/�I�W]�4ۨ��J2�s�-0�)����)��F��r�;42'� ٘��ڻcS�q������z�M�Su6O����م��N�^b��ZM3a_��Ғ�^>�8rZ�k/*�>���й����j6�c_H1�0@Z^z��w٠�ܠ��K-�C��������~8      [	   g   x�U��A�3a�������F���,wӎ eDYh�)�c��DM�$ٱ�HgQ/;�R�Z��'�T#߭k���ѝ	�!�:NѠr`�]�2d}
�o�'M      \	   K   x�M���0г=L��7�t�9���B���,��^����>��To�1�xqzXjb X���ůs���Q�d�      ]	   -  x����J1����)�	Bf&��m�J�@�"^*^z���������f�\�#�3	�ā=XC�j:�-mg����e� 	���C��V��Y�w[`�L���nX��Y��-@�(+��;~~�^�e�/��

)G���M��ӄ��(P��F�����pڟtS��1��ILM����of�E��g[ ��e!`L�+V+ˑ�"���x~�a�r�2	M�؃�#e�1�b�2�����Cb�DE��C!���Tvlj!bT���s��ے6.{_\�Hc���#i"��F�����|�6O����v      ^	   �   x���OI���44�377 SNC=CK��,�4�
(:��,3%���P��U֌+ '1/,�$1d��DE�)���I@%% ��Yb��\ZPT�R`bES`��X ���$l���/_�9�$�*�� ��q��qqq �4�      `	   �   x�m��n�0�g�)�$ſc$�&K�,�L��}�22u!?�x��}oۮ�/�2�9,���cL��|��/x�����6o�-LQ(�ȩP.p�T">|�����Vɬ:Id�6�^Ȩb�����R�ql�nߌp��
�O��ZL!�������v��f�n�J�˽�s�S+-h��5��V{�UU�\N5      a	   x   x�M�;�0��)\�&b�y;����Y�*2�#�����ތ4'
�]0�mO�fשׂ�c%o���QW��f�.E�u+��ÙN�G���t��0x�Y���j��W���<�#_Fc�z�&�      b	     x���M��@���>@�2���xK#$��X�X�[��"�b�#p�`Ӯ���ޓ�U�t����˺��>�]$�e����>�WM=[6ⶈ�2n���㶉�6f#�7�{#�7"{?/v�͟�xϻ+	�HB!�C���> }@�`�����W�~(8J8J:J9J;�8�~Rp���g���j���hGG	GIG)GiGG�O
�<8����}����9Y���M~Vm�Px��R��K��/�
o_x�����2����UQ﫼M6yן���:2訠���	:6� ��� ���������~x�\�����<|�/�m~�clB�	�&��l°	�$���=���{<���sy�ڮ9U��dU4�)�u9��|;#�#��H>����#��X.�.���.`������t�Zu����"A��HQ�)2�)���&�v��s�+�usl���#E�"I��HSd(�S��h/Lz�����6����\�� .\�p����@����m>������4      Q	   :  x����N�0E��W�P���,C	B��*Z�����x�v�ү��DVȫ�s��3w�!Hs�&1=%nL�C�F6F��E�"�!�bi��^s��G���&�>��-:��0��վC�!.��kr���&|���h���W�l�T��G]q\M<ks���gUj�ʵ3ַƷȣ4��E=.�
6,R+��X�Y4Gm�qA��ƴ�AF�����7T��{�4��XP�!�2��D�Q<3Ug&kOM����L)��{7l٧������\��G�|P�;�CG
K�S�9ӹ�#���Ie����v���C���+/B�o�C��      d	   �   x�=�KNAD��)���� !%�-�1�Rǎ�{F	��\�(l�U=ճ�{����U����@\�ƹ%	4&�8�{�J�g�W����-H��������-�`75)e�ƭ��K�k�~� �m�鬡faO��f᪓�֗�O�(,�+Z��\��#�����a��x��"�[�K|�!���M�      f	      x������ � �      h	   2   x���squ���t��4�4�33 #.G� �(7O/N#�=... i��      j	   �   x�]��n�0Eg�+8�K�$}��� ���kBf2�J������@W�C\�v;VA�Mj6��3�v����I�l�,X�NR�g�@t"�xY�mލő L$�����F�HJ&��+���z��_+}SO)/\T4�Y�/��a��К�\a�w{��qDp:��.���f�������0]8^Yԛ�B��X[9L�QL
&�<揲����t��\�h1�빻*|��r����ϲ����m��k�f      l	   g   x�]ιQ�x]�C�����������!���C(�PU1v���}�����I� ��VhbQ>=~��w��Ģ5��gg�k-�z�v"���/Ad!E      R	   �  x�U�=n�0Fk�� �P�+māa�)�A�4̊�% ��VJ��I�2mڽXfh#��D���������u.�$�S�r��yY���v���b@��� Pè4/P��Vk�Xo,��h�����N�)�-��[�s=�,�]�k�S^k��@X�64��z+hj�Ђ�+���v�n;���M����)�\��?�D��Tjb2�Bǁu'��6��.0�_�����i���t�G���a+��]~��1�

"g�]��kWa0 Z
z��c:�yYE^[-�Z�Cy����&k�85 ��i�q	o�c?���J�J\V.�����庾A�-潻w�H6�b���	/F��N}��B�=��osj���+�t�^��T�6�����S]H$�_朦�5�V�dY�[1dґA:��/fD�.�a�$����//Z�+      m	   �   x�U�KNC1E��*<l�'$�L��-�R;�I$�B,�#�!xr����mp>�j�EeI���n��Ck��/�Z5�y��c/�(o����%���邯�8�/���S(�t^�s�Ue�����[��;��G�D�|�ҁζ��?��Nڄ�>�
%�R�X��,e���/*�����]�l���9��y ?�WB�      o	   T   x�3��H-�M��7��9��|�J2��.#�B#l���93rR�����s&���	.��B�,�!�b���� i2&v      q	   �   x�M�M�0F��N�	��niҝn4��LhM��4iˆky/f�$�����묦��M����qO��9?m�MT�R��F�j
W���5����U����.�0�U4�~��v �� ��	��pn��=��SȰ$+��v&Q.Q����(7�      s	   �   x�E�ˑ D��E�Hb#���X�Y���Oi1h@��Ac#]O;�N��E���瀸3Z3�.�`��)�ء�B��Μ&%b��0<�cj#�J�g�h�Х�����i�dS,"�wC�k`�%�P����1�&{n3�В}��yj���LLO�|���4��|��2(mƁ>?���D��k,���?�1?k���G�      u	   7  x����N�0��~�N��v��j�K땋i�)�S?`����6i8 9�D� b��y/P����3d�xV�F�Z�J��� �L��b�Ye�mlF�!p;ڦ�!ZS8�\#�q����M��oo��$G ajH��Ѿz�����t88�NiÓg�-Q�G�����nڥ�������p�~wO;WNH]Ҥ	`sL��dbZ���x7Jl�mΝP�g!C){)]%���l�	��6Ljb�XQL�oV'W���:W����2=lm=z�[B��zQ��\C�g�/�(�~ z�W      w	   \   x�3�4116�05�4�,�44�4204�50"����LN�K�LT�MM�LN*��".CKCs3KCcKN#�v�s]C]C$�H-LC� ��Z      y	   d   x�3��4�036���q�320�4�2�ҳ4 ClR�H��A! As������	6����%`����B�suq�t'T��:L�=ܝ!ƛb
�Qowi� ~ER      z	     x����N�0�g�)<�p�8m�t�c@'�	1��6:r�I�&�����rb�����I&�)#kRp��pϱ�c�v<r���"{�N�!7Dp!�Kl�n���7���dǫ��n��a�{;8ƒ��&�;����"��W�[�M�t���{����e��r�O�1�eu��-��-����h8���/��JB䪀�#U���}����F�����O����em�b�%���%� ��3��p˭"%k!�n�ly������.x'^~$$��d-!�;���y[U�P̅'      {	      x������ � �      |	   :   x�3�447�44��4�t.JM�,�q-.�4204�54�52A0M9�L8K�b���� ��      ~	   �   x�M�=R�@�k�)TB�I�8�m*�*�ؕ�2땳?.�g���Ő
F*4�����0t�G{���p�k����'��,Nz�Lȡu25E�9 �:E�9Q�X0r䵦��S����WZ��'*L��u�K:�~������gV��̕�E#��	(B�����=��5x��ec���Iwi�E-���*e��}�̢,��Қ����;��i��ÿ�I#%I�[c�
�iy      	   6   x�+.-H-*�,�/�LL����,�p%��$��e`\.��,.)���qqq 4�
      �	   �  x�m�ɲ�H@���xۧ$��q �d��	�<"__/^UGw�n��=�y�uC�c�U-���?Q�%�¯
�|~ �n�{��2AJ��jt�]��©�#�w�S���彽8ܸ�p*����!����IeQu�(ն�e5��2T�6�t֧��z���x�z�tI��' �$��5ɯ)�=�̯���t���V4i�3u�Ů�u�ܦ�2�qe6��V�|q���U��Y��;F���@�LwꉡbD+!��s�:�=6B���~���m�!�YG��yEJ�V�eLk@�e�bI9�_�mR}w����3P-�߹�T�C,�����[ʢQH�B>!R�`7?�w*��u��e�g�Z�m*&��!"����nw��ۣ�.���|��Vo��������?�׆%�|�]V:�䇔��#7Z�� ��X"߁� ��v ��	���QڮfF/�n؞��x��(�ӖqP�g���+�D=�M#���,�����18�}���5_��<Gü�W*s��iZhRR���9֥1��z��ȾT���ߞ�����2�I��|5@f��Mb��EmYI{��hN�xQ¬��q��%�?��c��# ���:_N�a�}j^�C����k�^�,�_vư��#ɳ�˴#Z�E�=	��d���ր}� �s���/�lP*     
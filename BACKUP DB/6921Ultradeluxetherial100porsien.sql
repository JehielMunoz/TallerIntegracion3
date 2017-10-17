--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.5
-- Dumped by pg_dump version 9.6.5

-- Started on 2017-10-17 08:33:39

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2401 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 185 (class 1259 OID 25636)
-- Name: rel_tEmpleados_tBonos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tEmpleados_tBonos" (
    "Rut" character varying(15) NOT NULL,
    "id_Bono" integer NOT NULL,
    "Monto" integer
);


ALTER TABLE "rel_tEmpleados_tBonos" OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 25639)
-- Name: tBonos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tBonos" (
    "Bono" character varying(50),
    "Imponible" boolean NOT NULL,
    "Activo" boolean NOT NULL,
    "id_Bono" integer NOT NULL
);


ALTER TABLE "tBonos" OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 25642)
-- Name: tEmpleados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tEmpleados" (
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


ALTER TABLE "tEmpleados" OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 25647)
-- Name: jkljkl; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW jkljkl AS
 SELECT "tEmpleados"."Rut",
    "tBonos"."Bono",
    "tBonos"."Activo",
    "tBonos"."id_Bono",
    "tBonos"."Imponible"
   FROM (("tBonos"
     JOIN "rel_tEmpleados_tBonos" ON (("tBonos"."id_Bono" = "rel_tEmpleados_tBonos"."id_Bono")))
     JOIN "tEmpleados" ON ((("rel_tEmpleados_tBonos"."Rut")::text = ("tEmpleados"."Rut")::text)))
  WHERE (("tEmpleados"."Rut")::bpchar = '094432855'::bpchar);


ALTER TABLE jkljkl OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 25652)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE migrations OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 25655)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE migrations_id_seq OWNER TO postgres;

--
-- TOC entry 2402 (class 0 OID 0)
-- Dependencies: 190
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- TOC entry 191 (class 1259 OID 25657)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE password_resets OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 25663)
-- Name: rel_tAlumnos_tApoderados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tAlumnos_tApoderados" (
    "Rut_apo" character varying(15) NOT NULL,
    "Rut_alu" character varying(15) NOT NULL,
    "Relacion" character varying(30)
);


ALTER TABLE "rel_tAlumnos_tApoderados" OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 25666)
-- Name: rel_tAlumnos_tHermanos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tAlumnos_tHermanos" (
    "Rut" character varying(15) NOT NULL,
    "id_Hermano" integer NOT NULL
);


ALTER TABLE "rel_tAlumnos_tHermanos" OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 25669)
-- Name: rel_tAlumnos_tPadres; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tAlumnos_tPadres" (
    "Rut_alu" character varying(15) NOT NULL,
    "Rut_padre" character varying(15) NOT NULL,
    "Parentesco" character varying(20)
);


ALTER TABLE "rel_tAlumnos_tPadres" OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 25672)
-- Name: rel_tEmpleados_tCargos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tEmpleados_tCargos" (
    "Rut" character varying(15) NOT NULL,
    "id_Cargo" integer NOT NULL
);


ALTER TABLE "rel_tEmpleados_tCargos" OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 25675)
-- Name: rel_tEmpleados_tDescuentos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tEmpleados_tDescuentos" (
    "id_Descuento" integer NOT NULL,
    "Monto" integer,
    "Rut" character varying(15) NOT NULL
);


ALTER TABLE "rel_tEmpleados_tDescuentos" OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 25678)
-- Name: rel_tEmpleados_tGastos_extra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "rel_tEmpleados_tGastos_extra" (
    "Rut" character varying(15) NOT NULL,
    "id_Gasto" integer NOT NULL,
    "Info" character varying(60),
    "Tasa_gasto" real,
    "Monto" integer
);


ALTER TABLE "rel_tEmpleados_tGastos_extra" OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 25681)
-- Name: tAFP; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tAFP" (
    "AFP" character varying(50),
    "Tasa" real,
    "SIS" real,
    "Activo" boolean DEFAULT true NOT NULL,
    "id_AFP" integer NOT NULL
);


ALTER TABLE "tAFP" OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 25685)
-- Name: tAFP_id_AFP_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tAFP_id_AFP_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tAFP_id_AFP_seq" OWNER TO postgres;

--
-- TOC entry 2403 (class 0 OID 0)
-- Dependencies: 199
-- Name: tAFP_id_AFP_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tAFP_id_AFP_seq" OWNED BY "tAFP"."id_AFP";


--
-- TOC entry 200 (class 1259 OID 25687)
-- Name: tAlumnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tAlumnos" (
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


ALTER TABLE "tAlumnos" OWNER TO postgres;

--
-- TOC entry 2404 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN "tAlumnos"."Nombre"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "tAlumnos"."Nombre" IS '
';


--
-- TOC entry 2405 (class 0 OID 0)
-- Dependencies: 200
-- Name: COLUMN "tAlumnos"."Direccion"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "tAlumnos"."Direccion" IS '
';


--
-- TOC entry 201 (class 1259 OID 25690)
-- Name: tApoderados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tApoderados" (
    "Rut" character varying(15) NOT NULL,
    "Nombre" character varying(70),
    "Email" character varying(40),
    "Fono" character varying(20),
    "Activo" boolean
);


ALTER TABLE "tApoderados" OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 25693)
-- Name: tBonos_id_Bono_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tBonos_id_Bono_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tBonos_id_Bono_seq" OWNER TO postgres;

--
-- TOC entry 2406 (class 0 OID 0)
-- Dependencies: 202
-- Name: tBonos_id_Bono_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tBonos_id_Bono_seq" OWNED BY "tBonos"."id_Bono";


--
-- TOC entry 203 (class 1259 OID 25695)
-- Name: tCargos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tCargos" (
    "Cargo" character varying(50),
    "id_Cargo" integer NOT NULL
);


ALTER TABLE "tCargos" OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 25698)
-- Name: tCargos_id_Cargo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tCargos_id_Cargo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tCargos_id_Cargo_seq" OWNER TO postgres;

--
-- TOC entry 2407 (class 0 OID 0)
-- Dependencies: 204
-- Name: tCargos_id_Cargo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tCargos_id_Cargo_seq" OWNED BY "tCargos"."id_Cargo";


--
-- TOC entry 205 (class 1259 OID 25700)
-- Name: tComportamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tComportamiento" (
    "Rut" character varying(15) NOT NULL,
    "id_Comentario" integer NOT NULL,
    "Comentario" character varying(500),
    "Tipo" character varying(10),
    "Autor" character varying(50),
    "Fecha" date
);


ALTER TABLE "tComportamiento" OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 25706)
-- Name: tComportamiento_id_Comentario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tComportamiento_id_Comentario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tComportamiento_id_Comentario_seq" OWNER TO postgres;

--
-- TOC entry 2408 (class 0 OID 0)
-- Dependencies: 206
-- Name: tComportamiento_id_Comentario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tComportamiento_id_Comentario_seq" OWNED BY "tComportamiento"."id_Comentario";


--
-- TOC entry 207 (class 1259 OID 25708)
-- Name: tContratos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tContratos" (
    "Contrato" character varying(20),
    "id_Contrato" integer NOT NULL,
    "Tasa_seguro_cesantia" real
);


ALTER TABLE "tContratos" OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 25711)
-- Name: tContratos_id_Contrato_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tContratos_id_Contrato_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tContratos_id_Contrato_seq" OWNER TO postgres;

--
-- TOC entry 2409 (class 0 OID 0)
-- Dependencies: 208
-- Name: tContratos_id_Contrato_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tContratos_id_Contrato_seq" OWNED BY "tContratos"."id_Contrato";


--
-- TOC entry 209 (class 1259 OID 25713)
-- Name: tDescuentos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tDescuentos" (
    "Descuento" character varying(30),
    "Activo" boolean DEFAULT true NOT NULL,
    "id_Descuento" integer NOT NULL,
    "Tipo" character varying(6)
);


ALTER TABLE "tDescuentos" OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 25717)
-- Name: tDescuentos_id_Descuento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tDescuentos_id_Descuento_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tDescuentos_id_Descuento_seq" OWNER TO postgres;

--
-- TOC entry 2410 (class 0 OID 0)
-- Dependencies: 210
-- Name: tDescuentos_id_Descuento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tDescuentos_id_Descuento_seq" OWNED BY "tDescuentos"."id_Descuento";


--
-- TOC entry 211 (class 1259 OID 25719)
-- Name: tEmpleado_Fono; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tEmpleado_Fono" (
    "Rut" character varying(15) NOT NULL,
    "N_telefono" character varying(18) NOT NULL
);


ALTER TABLE "tEmpleado_Fono" OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 25722)
-- Name: tGastos_extra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tGastos_extra" (
    "id_Gasto" integer NOT NULL,
    "Nombre_gasto" character varying(50)
);


ALTER TABLE "tGastos_extra" OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 25725)
-- Name: tGastos_extra_id_Gasto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tGastos_extra_id_Gasto_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tGastos_extra_id_Gasto_seq" OWNER TO postgres;

--
-- TOC entry 2411 (class 0 OID 0)
-- Dependencies: 213
-- Name: tGastos_extra_id_Gasto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tGastos_extra_id_Gasto_seq" OWNED BY "tGastos_extra"."id_Gasto";


--
-- TOC entry 214 (class 1259 OID 25727)
-- Name: tHermanos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tHermanos" (
    "id_Hermano" integer NOT NULL,
    "Nombre" character varying(70),
    "F_nacimiento" date,
    "Ocupacion" character varying(50),
    "Direccion" character varying(50)
);


ALTER TABLE "tHermanos" OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 25730)
-- Name: tHermanos_id_Hermano_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tHermanos_id_Hermano_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tHermanos_id_Hermano_seq" OWNER TO postgres;

--
-- TOC entry 2412 (class 0 OID 0)
-- Dependencies: 215
-- Name: tHermanos_id_Hermano_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tHermanos_id_Hermano_seq" OWNED BY "tHermanos"."id_Hermano";


--
-- TOC entry 216 (class 1259 OID 25732)
-- Name: tISAPRE; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tISAPRE" (
    "ISAPRE" character varying(30),
    "Tasa" real,
    "Activo" boolean DEFAULT true NOT NULL,
    "id_ISAPRE" integer NOT NULL
);


ALTER TABLE "tISAPRE" OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 25736)
-- Name: tISAPRE_id_ISAPRE_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tISAPRE_id_ISAPRE_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tISAPRE_id_ISAPRE_seq" OWNER TO postgres;

--
-- TOC entry 2413 (class 0 OID 0)
-- Dependencies: 217
-- Name: tISAPRE_id_ISAPRE_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tISAPRE_id_ISAPRE_seq" OWNED BY "tISAPRE"."id_ISAPRE";


--
-- TOC entry 218 (class 1259 OID 25738)
-- Name: tImpuesto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tImpuesto" (
    "id_Impuesto" integer NOT NULL,
    "fDesde" real,
    "fHasta" real,
    "Factor" real,
    "nDesde" integer,
    "nHasta" integer,
    "fRebaja" real,
    "nRebaja" integer
);


ALTER TABLE "tImpuesto" OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 25741)
-- Name: tImpuesto_id_Impuesto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tImpuesto_id_Impuesto_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tImpuesto_id_Impuesto_seq" OWNER TO postgres;

--
-- TOC entry 2414 (class 0 OID 0)
-- Dependencies: 219
-- Name: tImpuesto_id_Impuesto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tImpuesto_id_Impuesto_seq" OWNED BY "tImpuesto"."id_Impuesto";


--
-- TOC entry 220 (class 1259 OID 25743)
-- Name: tLicencias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tLicencias" (
    "Rut" character varying(15) NOT NULL,
    "id_Licencia" integer NOT NULL,
    "Descuenta" boolean,
    "Dias" integer,
    "F_inicio" date,
    "F_final" date,
    "Nombre_licencia" character varying(50),
    "Activo" boolean DEFAULT true NOT NULL,
    "Ultimo_val" integer
);


ALTER TABLE "tLicencias" OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 25747)
-- Name: tLicencias_id_Licencia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tLicencias_id_Licencia_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tLicencias_id_Licencia_seq" OWNER TO postgres;

--
-- TOC entry 2415 (class 0 OID 0)
-- Dependencies: 221
-- Name: tLicencias_id_Licencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tLicencias_id_Licencia_seq" OWNED BY "tLicencias"."id_Licencia";


--
-- TOC entry 222 (class 1259 OID 25749)
-- Name: tPadres; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tPadres" (
    "Rut" character varying(15) NOT NULL,
    "Nombre" character varying(70),
    "F_nacimiento" date,
    "Fono" character varying(15),
    "Email" character varying(50),
    "Vive_c_alu" boolean,
    "Estudios" character varying(20),
    "Ocupacion" character varying(50)
);


ALTER TABLE "tPadres" OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 25752)
-- Name: tPago; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tPago" (
    "Rut_alu" character varying(15) NOT NULL,
    "Rut_apo" character varying(15) NOT NULL,
    "Fecha" date,
    "Cantidad" integer,
    "Tipo" character varying(20)
);


ALTER TABLE "tPago" OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 25755)
-- Name: tPrestamos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tPrestamos" (
    "Rut" character varying(15) NOT NULL,
    "id_Prestamo" integer NOT NULL,
    "Nombre" character varying(70),
    "F_inicio" date,
    "F_final" date,
    "Monto" integer,
    "Activo" boolean DEFAULT true NOT NULL
);


ALTER TABLE "tPrestamos" OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 25759)
-- Name: tPrestamos_id_Prestamo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "tPrestamos_id_Prestamo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "tPrestamos_id_Prestamo_seq" OWNER TO postgres;

--
-- TOC entry 2416 (class 0 OID 0)
-- Dependencies: 225
-- Name: tPrestamos_id_Prestamo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "tPrestamos_id_Prestamo_seq" OWNED BY "tPrestamos"."id_Prestamo";


--
-- TOC entry 226 (class 1259 OID 25761)
-- Name: tSalud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tSalud" (
    "Rut" character varying(15) NOT NULL,
    "Fono" character varying(15),
    "Email" character varying(50),
    "Alergia" boolean,
    "p_Salud" boolean,
    "Antc_Alergia" character varying(500),
    "Antc_Salud" character varying(500)
);


ALTER TABLE "tSalud" OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 25767)
-- Name: tUsuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "tUsuarios" (
    "Usuario" character varying(30) NOT NULL,
    "Password" character varying(255),
    "Tipo" character varying(15)
);


ALTER TABLE "tUsuarios" OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 25770)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    rol character varying(1) DEFAULT 0
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 25776)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO postgres;

--
-- TOC entry 2417 (class 0 OID 0)
-- Dependencies: 229
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 2154 (class 2604 OID 25778)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- TOC entry 2156 (class 2604 OID 25779)
-- Name: tAFP id_AFP; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tAFP" ALTER COLUMN "id_AFP" SET DEFAULT nextval('"tAFP_id_AFP_seq"'::regclass);


--
-- TOC entry 2151 (class 2604 OID 25780)
-- Name: tBonos id_Bono; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tBonos" ALTER COLUMN "id_Bono" SET DEFAULT nextval('"tBonos_id_Bono_seq"'::regclass);


--
-- TOC entry 2157 (class 2604 OID 25781)
-- Name: tCargos id_Cargo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tCargos" ALTER COLUMN "id_Cargo" SET DEFAULT nextval('"tCargos_id_Cargo_seq"'::regclass);


--
-- TOC entry 2158 (class 2604 OID 25782)
-- Name: tComportamiento id_Comentario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tComportamiento" ALTER COLUMN "id_Comentario" SET DEFAULT nextval('"tComportamiento_id_Comentario_seq"'::regclass);


--
-- TOC entry 2159 (class 2604 OID 25783)
-- Name: tContratos id_Contrato; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tContratos" ALTER COLUMN "id_Contrato" SET DEFAULT nextval('"tContratos_id_Contrato_seq"'::regclass);


--
-- TOC entry 2161 (class 2604 OID 25784)
-- Name: tDescuentos id_Descuento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tDescuentos" ALTER COLUMN "id_Descuento" SET DEFAULT nextval('"tDescuentos_id_Descuento_seq"'::regclass);


--
-- TOC entry 2162 (class 2604 OID 25785)
-- Name: tGastos_extra id_Gasto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tGastos_extra" ALTER COLUMN "id_Gasto" SET DEFAULT nextval('"tGastos_extra_id_Gasto_seq"'::regclass);


--
-- TOC entry 2163 (class 2604 OID 25786)
-- Name: tHermanos id_Hermano; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tHermanos" ALTER COLUMN "id_Hermano" SET DEFAULT nextval('"tHermanos_id_Hermano_seq"'::regclass);


--
-- TOC entry 2165 (class 2604 OID 25787)
-- Name: tISAPRE id_ISAPRE; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tISAPRE" ALTER COLUMN "id_ISAPRE" SET DEFAULT nextval('"tISAPRE_id_ISAPRE_seq"'::regclass);


--
-- TOC entry 2166 (class 2604 OID 25788)
-- Name: tImpuesto id_Impuesto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tImpuesto" ALTER COLUMN "id_Impuesto" SET DEFAULT nextval('"tImpuesto_id_Impuesto_seq"'::regclass);


--
-- TOC entry 2168 (class 2604 OID 25789)
-- Name: tLicencias id_Licencia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tLicencias" ALTER COLUMN "id_Licencia" SET DEFAULT nextval('"tLicencias_id_Licencia_seq"'::regclass);


--
-- TOC entry 2170 (class 2604 OID 25790)
-- Name: tPrestamos id_Prestamo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tPrestamos" ALTER COLUMN "id_Prestamo" SET DEFAULT nextval('"tPrestamos_id_Prestamo_seq"'::regclass);


--
-- TOC entry 2171 (class 2604 OID 25791)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2354 (class 0 OID 25652)
-- Dependencies: 189
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO migrations VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);


--
-- TOC entry 2418 (class 0 OID 0)
-- Dependencies: 190
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('migrations_id_seq', 2, true);


--
-- TOC entry 2356 (class 0 OID 25657)
-- Dependencies: 191
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2357 (class 0 OID 25663)
-- Dependencies: 192
-- Data for Name: rel_tAlumnos_tApoderados; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tAlumnos_tApoderados" VALUES ('169582315', '199586349', 'Padre');


--
-- TOC entry 2358 (class 0 OID 25666)
-- Dependencies: 193
-- Data for Name: rel_tAlumnos_tHermanos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tAlumnos_tHermanos" VALUES ('199586349', 1);
INSERT INTO "rel_tAlumnos_tHermanos" VALUES ('199586349', 2);


--
-- TOC entry 2359 (class 0 OID 25669)
-- Dependencies: 194
-- Data for Name: rel_tAlumnos_tPadres; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tAlumnos_tPadres" VALUES ('199586349', '167568749', 'Madre');
INSERT INTO "rel_tAlumnos_tPadres" VALUES ('199586349', '169582315', 'Padre');


--
-- TOC entry 2351 (class 0 OID 25636)
-- Dependencies: 185
-- Data for Name: rel_tEmpleados_tBonos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tEmpleados_tBonos" VALUES ('094432855', 2, 10220);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('157352814', 12, 35783);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('157352814', 11, 32587);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('157352814', 4, 39853);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('157352814', 2, 25625);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 16, 16827);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 12, 189822);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 11, 172867);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 8, 65265);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 7, 21355);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 6, 64062);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('155796006', 5, 40661);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 16, 20566);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 13, 22692);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 12, 209795);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 11, 191056);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 8, 88869);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 7, 21355);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 6, 64062);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('152300867', 5, 49697);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 19, 184915);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 16, 16827);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 12, 292018);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 11, 265935);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 8, 72943);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 6, 64062);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('136287826', 5, 40661);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('132822565', 13, 81531);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('132822565', 12, 35783);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('132822565', 11, 32587);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('132822565', 9, 20000);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('132822565', 4, 18682);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('132822565', 2, 64616);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('094432855', 13, 30000);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('094432855', 12, 35783);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('094432855', 11, 32587);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('094432855', 9, 69999);
INSERT INTO "rel_tEmpleados_tBonos" VALUES ('094432855', 4, 39853);


--
-- TOC entry 2360 (class 0 OID 25672)
-- Dependencies: 195
-- Data for Name: rel_tEmpleados_tCargos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tEmpleados_tCargos" VALUES ('094432855', 2);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('157352814', 6);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('157352814', 5);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('157352814', 2);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('155796006', 3);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('152300867', 8);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('152300867', 4);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('136287826', 4);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('136287826', 3);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('132822565', 2);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('132822565', 1);
INSERT INTO "rel_tEmpleados_tCargos" VALUES ('094432855', 7);


--
-- TOC entry 2361 (class 0 OID 25675)
-- Dependencies: 196
-- Data for Name: rel_tEmpleados_tDescuentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tEmpleados_tDescuentos" VALUES (4, 7856, '155796006');
INSERT INTO "rel_tEmpleados_tDescuentos" VALUES (4, 15277, '152300867');
INSERT INTO "rel_tEmpleados_tDescuentos" VALUES (4, 21257, '136287826');
INSERT INTO "rel_tEmpleados_tDescuentos" VALUES (1, 12000, '094432855');


--
-- TOC entry 2362 (class 0 OID 25678)
-- Dependencies: 197
-- Data for Name: rel_tEmpleados_tGastos_extra; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('157352814', 5, 'MUTUAL C.CH.C.', 0.949999988, 2825);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('157352814', 4, 'A PLAZO FIJO', 3, 8921);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('157352814', 3, 'ACUMULA MES', 1.25, 10729);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('157352814', 1, 'Próvida', 1.14999998, 3420);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('155796006', 5, 'MUTUAL C.CH.C.', 0.949999988, 6111);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('155796006', 4, 'A PLAZO FIJO', 3, 19298);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('155796006', 3, 'ACUMULA MES', 1.25, 18129);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('155796006', 1, 'Habitat', 1.14999998, 7398);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('152300867', 5, 'MUTUAL C.CH.C.', 0.949999988, 6628);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('152300867', 4, 'INDEFINIDO', 2.4000001, 16744);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('152300867', 3, 'ACUMULA MES', 1.25, 19636);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('152300867', 1, 'Cuprum', 1.14999998, 8023);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('136287826', 5, 'MUTUAL C.CH.C.', 0.949999988, 13525);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('136287826', 4, 'INDEFINIDO', 2.4000001, 34168);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('136287826', 3, 'ACUMULA MES', 1.25, 22635);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('136287826', 1, 'Próvida', 1.14999998, 16372);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('132822565', 5, 'MUTUAL C.CH.C.', 0.949999988, 6181);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('132822565', 4, 'INDEFINIDO', 2.4000001, 15616);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('132822565', 3, 'ACUMULA MES', 1.25, 25500);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('132822565', 1, 'Próvida', 1.14999998, 7483);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('094432855', 5, 'MUTUAL C.CH.C.', 0.949999988, 3490);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('094432855', 4, 'INDEFINIDO', 2.4000001, 8816);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('094432855', 3, 'ACUMULA MES', 1.25, 10729);
INSERT INTO "rel_tEmpleados_tGastos_extra" VALUES ('094432855', 1, 'Próvida', 1.14999998, 4225);


--
-- TOC entry 2363 (class 0 OID 25681)
-- Dependencies: 198
-- Data for Name: tAFP; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tAFP" VALUES ('Modelo', 10.7700005, 1.14999998, true, 7);
INSERT INTO "tAFP" VALUES ('Próvida', 11.54, 1.14999998, true, 6);
INSERT INTO "tAFP" VALUES ('PlanVital', 10.4099998, 1.14999998, true, 5);
INSERT INTO "tAFP" VALUES ('Hábitat', 11.2700005, 1.14999998, true, 4);
INSERT INTO "tAFP" VALUES ('Cuprum', 11.4799995, 1.14999998, true, 3);
INSERT INTO "tAFP" VALUES ('Capital', 11.4399996, 1.14999998, true, 2);
INSERT INTO "tAFP" VALUES ('No Cotiza', 0, 0, true, 1);


--
-- TOC entry 2419 (class 0 OID 0)
-- Dependencies: 199
-- Name: tAFP_id_AFP_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tAFP_id_AFP_seq"', 7, true);


--
-- TOC entry 2365 (class 0 OID 25687)
-- Dependencies: 200
-- Data for Name: tAlumnos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tAlumnos" VALUES ('199586349', 'Arturo Alexis Melgarejo Tapia', '1998-01-18', '2014-01-16', 'S.Martin 9342', 'Temuco', '1ro Medio', '1ro Medio', 'Escuela Ingles', false, 0, false, true);


--
-- TOC entry 2366 (class 0 OID 25690)
-- Dependencies: 201
-- Data for Name: tApoderados; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tApoderados" VALUES ('169582315', 'Guido Marcelo Melgarejo Meltran', 'karatemel@gmail.com', '(09) 481 64 185', true);


--
-- TOC entry 2352 (class 0 OID 25639)
-- Dependencies: 186
-- Data for Name: tBonos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tBonos" VALUES ('Horas extra', true, true, 1);
INSERT INTO "tBonos" VALUES ('Desgaste de herramientas', true, true, 24);
INSERT INTO "tBonos" VALUES ('Ley SEP', true, true, 23);
INSERT INTO "tBonos" VALUES ('Viatico', false, true, 22);
INSERT INTO "tBonos" VALUES ('Finiquito', false, true, 21);
INSERT INTO "tBonos" VALUES ('Aguinaldo', true, true, 20);
INSERT INTO "tBonos" VALUES ('Bono de responsabilidad ley SEP', true, true, 19);
INSERT INTO "tBonos" VALUES ('Bono SAE', false, true, 18);
INSERT INTO "tBonos" VALUES ('Bono Escolar', false, true, 17);
INSERT INTO "tBonos" VALUES ('Bono ley [19410]', true, true, 16);
INSERT INTO "tBonos" VALUES ('Bono de vacaciones', false, true, 15);
INSERT INTO "tBonos" VALUES ('Bono Termino de conflicto', false, true, 14);
INSERT INTO "tBonos" VALUES ('Bono Colacion', false, true, 13);
INSERT INTO "tBonos" VALUES ('Bono excelencia academica trieno Junio', true, true, 12);
INSERT INTO "tBonos" VALUES ('Bono excelencia academica trieno Marzo', true, true, 11);
INSERT INTO "tBonos" VALUES ('Comisiones e incentivos', true, true, 10);
INSERT INTO "tBonos" VALUES ('Bono de Produccion', true, true, 9);
INSERT INTO "tBonos" VALUES ('Asignacion de Zona', true, true, 8);
INSERT INTO "tBonos" VALUES ('BRP Mencion', true, true, 7);
INSERT INTO "tBonos" VALUES ('BRP Titulo', true, true, 6);
INSERT INTO "tBonos" VALUES ('Bono Ley [19933]', true, true, 5);
INSERT INTO "tBonos" VALUES ('Bono Ley [19464]', true, true, 4);
INSERT INTO "tBonos" VALUES ('Bono Alimentacion', true, true, 3);
INSERT INTO "tBonos" VALUES ('Bono Movilizacion', false, true, 2);


--
-- TOC entry 2420 (class 0 OID 0)
-- Dependencies: 202
-- Name: tBonos_id_Bono_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tBonos_id_Bono_seq"', 25, true);


--
-- TOC entry 2368 (class 0 OID 25695)
-- Dependencies: 203
-- Data for Name: tCargos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tCargos" VALUES ('Reforzamiento Ingles', 13);
INSERT INTO "tCargos" VALUES ('Docente de aula', 12);
INSERT INTO "tCargos" VALUES ('Contador', 10);
INSERT INTO "tCargos" VALUES ('Mantencion establecimiento', 9);
INSERT INTO "tCargos" VALUES ('Docente', 8);
INSERT INTO "tCargos" VALUES ('Auxiliar', 7);
INSERT INTO "tCargos" VALUES ('Ley SEP', 6);
INSERT INTO "tCargos" VALUES ('Apoyo en convivencia escolar', 5);
INSERT INTO "tCargos" VALUES ('Directivo SEP', 4);
INSERT INTO "tCargos" VALUES ('Docente Basica', 3);
INSERT INTO "tCargos" VALUES ('Asistente de la Educación', 2);
INSERT INTO "tCargos" VALUES ('Administrativo', 1);


--
-- TOC entry 2421 (class 0 OID 0)
-- Dependencies: 204
-- Name: tCargos_id_Cargo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tCargos_id_Cargo_seq"', 13, true);


--
-- TOC entry 2370 (class 0 OID 25700)
-- Dependencies: 205
-- Data for Name: tComportamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2422 (class 0 OID 0)
-- Dependencies: 206
-- Name: tComportamiento_id_Comentario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tComportamiento_id_Comentario_seq"', 1, false);


--
-- TOC entry 2372 (class 0 OID 25708)
-- Dependencies: 207
-- Data for Name: tContratos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tContratos" VALUES ('INDEFINIDO', 1, 0.600000024);
INSERT INTO "tContratos" VALUES ('A PLAZO FIJO', 2, 0.600000024);


--
-- TOC entry 2423 (class 0 OID 0)
-- Dependencies: 208
-- Name: tContratos_id_Contrato_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tContratos_id_Contrato_seq"', 2, true);


--
-- TOC entry 2374 (class 0 OID 25713)
-- Dependencies: 209
-- Data for Name: tDescuentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tDescuentos" VALUES ('Adicional salud', true, 1, 'legal');
INSERT INTO "tDescuentos" VALUES ('Finiquito', true, 13, 'vario');
INSERT INTO "tDescuentos" VALUES ('Anticipos en efectivo', true, 12, 'vario');
INSERT INTO "tDescuentos" VALUES ('Quincena mensual', true, 11, 'vario');
INSERT INTO "tDescuentos" VALUES ('Otras retenciones', true, 10, 'vario');
INSERT INTO "tDescuentos" VALUES ('Retenciones legales', true, 9, 'vario');
INSERT INTO "tDescuentos" VALUES ('Boletas u honorarios', true, 8, 'vario');
INSERT INTO "tDescuentos" VALUES ('Retencion judicial', true, 7, 'vario');
INSERT INTO "tDescuentos" VALUES ('CCAF (Caja compensaciones)', true, 6, 'vario');
INSERT INTO "tDescuentos" VALUES ('Ahorro provisional voluntario', true, 5, 'legal');
INSERT INTO "tDescuentos" VALUES ('Impuesto unico a la renta', true, 4, 'legal');
INSERT INTO "tDescuentos" VALUES ('Atrasos injustificados', true, 3, 'legal');
INSERT INTO "tDescuentos" VALUES ('Seguro cesantia', true, 2, 'legal');


--
-- TOC entry 2424 (class 0 OID 0)
-- Dependencies: 210
-- Name: tDescuentos_id_Descuento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tDescuentos_id_Descuento_seq"', 14, true);


--
-- TOC entry 2376 (class 0 OID 25719)
-- Dependencies: 211
-- Data for Name: tEmpleado_Fono; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tEmpleado_Fono" VALUES ('094432855', '(09) 850 55 430   ');
INSERT INTO "tEmpleado_Fono" VALUES ('157352814', '(09) 850 55 429');
INSERT INTO "tEmpleado_Fono" VALUES ('155796006', '(09) 850 55 427');
INSERT INTO "tEmpleado_Fono" VALUES ('152300867', '(09) 850 55 431');
INSERT INTO "tEmpleado_Fono" VALUES ('136287826', '(09) 850 55 428');
INSERT INTO "tEmpleado_Fono" VALUES ('132822565', '(09) 907 45 349');


--
-- TOC entry 2353 (class 0 OID 25642)
-- Dependencies: 187
-- Data for Name: tEmpleados; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tEmpleados" VALUES ('Angélica Haidee Herrera Muñoz', '1982-09-18', '2014-04-07', 2, 257500, 6, '157352814', 2, 45, 0, true, 0);
INSERT INTO "tEmpleados" VALUES ('Lilian Margarita Muñoz Fuentes', '1984-07-13', '2014-03-03', 2, 435098, 5, '155796006', 2, 34, 12797, true, 0);
INSERT INTO "tEmpleados" VALUES ('Blas Manuel Valenzuela Santander', '1983-11-01', '2008-03-03', 1, 471275, 3, '152300867', 2, 35, 13465, true, 0);
INSERT INTO "tEmpleados" VALUES ('Susana Andrea sepúlveda Medina', '1988-08-26', '2010-03-01', 1, 358316, 6, '136287826', 2, 28, 12797, true, 0);
INSERT INTO "tEmpleados" VALUES ('Richard Edgardo Naguil Sánchez', '1977-05-19', '2009-04-01', 1, 612000, 6, '132822565', 2, 45, 0, true, 0);
INSERT INTO "tEmpleados" VALUES ('Dagoberto Antonio Valenzuela Jiménez', '1983-02-14', '2001-03-12', 1, 257500, 6, '094432855', 2, 45, 0, true, 0);


--
-- TOC entry 2377 (class 0 OID 25722)
-- Dependencies: 212
-- Data for Name: tGastos_extra; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tGastos_extra" VALUES (1, 'SEGURO DE INVALIDES Y SOBREVIVENCIA               ');
INSERT INTO "tGastos_extra" VALUES (8, 'OTROS GASTOS (ESPECIFIQUE)');
INSERT INTO "tGastos_extra" VALUES (7, 'ESTADIA, PENSION, HOTELES, OTROS');
INSERT INTO "tGastos_extra" VALUES (6, 'PASAJES, VUELOS, VIAJES,OTROS');
INSERT INTO "tGastos_extra" VALUES (5, 'MUTUAL (ACIDENTES DE TRABAJO)');
INSERT INTO "tGastos_extra" VALUES (4, 'SEGURO CESANTIA');
INSERT INTO "tGastos_extra" VALUES (3, 'FERIADO PROPORCIONAL');
INSERT INTO "tGastos_extra" VALUES (2, 'INDEMNIZACIÓN DE AÑOS Y SERVICIOS');


--
-- TOC entry 2425 (class 0 OID 0)
-- Dependencies: 213
-- Name: tGastos_extra_id_Gasto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tGastos_extra_id_Gasto_seq"', 8, true);


--
-- TOC entry 2379 (class 0 OID 25727)
-- Dependencies: 214
-- Data for Name: tHermanos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tHermanos" VALUES (1, 'Hermano1', NULL, 'Hermano', 'S.Martin                      ');
INSERT INTO "tHermanos" VALUES (2, 'Hermano2', NULL, 'Hermano', 'S.Martin');


--
-- TOC entry 2426 (class 0 OID 0)
-- Dependencies: 215
-- Name: tHermanos_id_Hermano_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tHermanos_id_Hermano_seq"', 2, true);


--
-- TOC entry 2381 (class 0 OID 25732)
-- Dependencies: 216
-- Data for Name: tISAPRE; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tISAPRE" VALUES ('Vida Tres', 7, true, 13);
INSERT INTO "tISAPRE" VALUES ('Sfera', 7, true, 12);
INSERT INTO "tISAPRE" VALUES ('Normedica', 7, true, 11);
INSERT INTO "tISAPRE" VALUES ('MasVida', 7, true, 10);
INSERT INTO "tISAPRE" VALUES ('Fusat', 7, true, 9);
INSERT INTO "tISAPRE" VALUES ('Fundación', 7, true, 8);
INSERT INTO "tISAPRE" VALUES ('Ferrosalud', 7, true, 7);
INSERT INTO "tISAPRE" VALUES ('Cruz Blanca', 7, true, 6);
INSERT INTO "tISAPRE" VALUES ('Consalud', 7, true, 5);
INSERT INTO "tISAPRE" VALUES ('Colmena', 7, true, 4);
INSERT INTO "tISAPRE" VALUES ('Banmedica', 7, true, 3);
INSERT INTO "tISAPRE" VALUES ('Fonasa', 7, true, 2);
INSERT INTO "tISAPRE" VALUES ('No Cotiza', 0, true, 1);


--
-- TOC entry 2427 (class 0 OID 0)
-- Dependencies: 217
-- Name: tISAPRE_id_ISAPRE_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tISAPRE_id_ISAPRE_seq"', 13, true);


--
-- TOC entry 2383 (class 0 OID 25738)
-- Dependencies: 218
-- Data for Name: tImpuesto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tImpuesto" VALUES (1, 0, 13.5, 0, 0, 619745, 0, 0);
INSERT INTO "tImpuesto" VALUES (2, 13.5, 30, 0.0399999991, 619745, 1377210, 0.540000021, 24790);
INSERT INTO "tImpuesto" VALUES (3, 30, 50, 0.0799999982, 1377210, 2295350, 1.74000001, 79878);
INSERT INTO "tImpuesto" VALUES (4, 50, 70, 0.135000005, 2295350, 3213490, 4.48999977, 206122);
INSERT INTO "tImpuesto" VALUES (5, 70, 90, 0.230000004, 3213490, 4131630, 11.1400003, 511404);
INSERT INTO "tImpuesto" VALUES (6, 90, 120, 0.30399999, 4131630, 5508840, 17.7999992, 817145);
INSERT INTO "tImpuesto" VALUES (7, 120, 150, 0.354999989, 5508840, 6886050, 23.9200001, 1098095);
INSERT INTO "tImpuesto" VALUES (8, 150, NULL, 0.400000006, 6886050, NULL, 30.6700001, 1407968);


--
-- TOC entry 2428 (class 0 OID 0)
-- Dependencies: 219
-- Name: tImpuesto_id_Impuesto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tImpuesto_id_Impuesto_seq"', 8, true);


--
-- TOC entry 2385 (class 0 OID 25743)
-- Dependencies: 220
-- Data for Name: tLicencias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tLicencias" VALUES ('094432855', 1, true, 15, '2015-06-06', '2018-06-06', 'Licencia Medica', true, NULL);


--
-- TOC entry 2429 (class 0 OID 0)
-- Dependencies: 221
-- Name: tLicencias_id_Licencia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tLicencias_id_Licencia_seq"', 1, true);


--
-- TOC entry 2387 (class 0 OID 25749)
-- Dependencies: 222
-- Data for Name: tPadres; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tPadres" VALUES ('169582315', 'Guido Marcelo Melgarejo Meltran', '1953-02-11', '(09) 481 64 185', 'karatemel@gmail.com', true, 'Media completa', 'Instructor karate');
INSERT INTO "tPadres" VALUES ('167568749', 'Viviana Alicia Tapia Montanares', '1956-02-02', '(09) 237 58 786', 'Aliciatm@gmail.com', true, 'Media completa', 'Contadora');


--
-- TOC entry 2388 (class 0 OID 25752)
-- Dependencies: 223
-- Data for Name: tPago; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2389 (class 0 OID 25755)
-- Dependencies: 224
-- Data for Name: tPrestamos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2430 (class 0 OID 0)
-- Dependencies: 225
-- Name: tPrestamos_id_Prestamo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"tPrestamos_id_Prestamo_seq"', 1, false);


--
-- TOC entry 2391 (class 0 OID 25761)
-- Dependencies: 226
-- Data for Name: tSalud; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tSalud" VALUES ('199586349', '(09) 235 33 531', 'dralfonsocorate@gmail.com', true, true, 'El alumno presenta antecedentes de alergia al huevo.', 'El alumno tiene Válvula aórtica bicúspide que puede afectar en su actividad fisica bajando su rendimiento. Tener cuidado si comienza a ponerse palido.');


--
-- TOC entry 2392 (class 0 OID 25767)
-- Dependencies: 227
-- Data for Name: tUsuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tUsuarios" VALUES ('supervisor', 'admin', 'supervisor');
INSERT INTO "tUsuarios" VALUES ('contador', 'admin', 'contador');
INSERT INTO "tUsuarios" VALUES ('admin', 'admin', 'administrador');


--
-- TOC entry 2393 (class 0 OID 25770)
-- Dependencies: 228
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users VALUES (1, 'admin', 'admin@gmail.com', '$2y$10$bUr.YxFm6ZmpVVirPzIp1OXgXH9FKueksttvzpW/6ENnDJq6zv10y', 'PAj61rRDlTflwxCZ8Aw5baZZEqyvwirSfCDwv2qv9yBQfGePwD2uu7OWNeFP', '2017-09-26 22:28:16', '2017-09-26 22:28:16', '1');


--
-- TOC entry 2431 (class 0 OID 0)
-- Dependencies: 229
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- TOC entry 2180 (class 2606 OID 25793)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2190 (class 2606 OID 25795)
-- Name: rel_tEmpleados_tDescuentos pk_rel_tEmpleados_tDescuentos; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tEmpleados_tDescuentos"
    ADD CONSTRAINT "pk_rel_tEmpleados_tDescuentos" PRIMARY KEY ("Rut", "id_Descuento");


--
-- TOC entry 2182 (class 2606 OID 25797)
-- Name: rel_tAlumnos_tApoderados rel_tAlumno_tApoderado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tAlumnos_tApoderados"
    ADD CONSTRAINT "rel_tAlumno_tApoderado_pkey" PRIMARY KEY ("Rut_apo", "Rut_alu");


--
-- TOC entry 2184 (class 2606 OID 25799)
-- Name: rel_tAlumnos_tHermanos rel_tAlumno_tHermanos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tAlumnos_tHermanos"
    ADD CONSTRAINT "rel_tAlumno_tHermanos_pkey" PRIMARY KEY ("Rut", "id_Hermano");


--
-- TOC entry 2186 (class 2606 OID 25801)
-- Name: rel_tAlumnos_tPadres rel_tAlumno_tPadres_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tAlumnos_tPadres"
    ADD CONSTRAINT "rel_tAlumno_tPadres_pkey" PRIMARY KEY ("Rut_alu", "Rut_padre");


--
-- TOC entry 2174 (class 2606 OID 25803)
-- Name: rel_tEmpleados_tBonos rel_tEmpleados_tBono_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tEmpleados_tBonos"
    ADD CONSTRAINT "rel_tEmpleados_tBono_pkey" PRIMARY KEY ("Rut", "id_Bono");


--
-- TOC entry 2188 (class 2606 OID 25805)
-- Name: rel_tEmpleados_tCargos rel_tEmpleados_tCargos_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tEmpleados_tCargos"
    ADD CONSTRAINT "rel_tEmpleados_tCargos_pk" PRIMARY KEY ("Rut", "id_Cargo");


--
-- TOC entry 2192 (class 2606 OID 25807)
-- Name: rel_tEmpleados_tGastos_extra rel_tEmpleados_tGastos_extra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "rel_tEmpleados_tGastos_extra"
    ADD CONSTRAINT "rel_tEmpleados_tGastos_extra_pkey" PRIMARY KEY ("Rut", "id_Gasto");


--
-- TOC entry 2194 (class 2606 OID 25809)
-- Name: tAFP tAFP_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tAFP"
    ADD CONSTRAINT "tAFP_pkey" PRIMARY KEY ("id_AFP");


--
-- TOC entry 2196 (class 2606 OID 25811)
-- Name: tAlumnos tAlumno_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tAlumnos"
    ADD CONSTRAINT "tAlumno_pkey" PRIMARY KEY ("Rut");


--
-- TOC entry 2198 (class 2606 OID 25813)
-- Name: tApoderados tApoderado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tApoderados"
    ADD CONSTRAINT "tApoderado_pkey" PRIMARY KEY ("Rut");


--
-- TOC entry 2176 (class 2606 OID 25815)
-- Name: tBonos tBonos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tBonos"
    ADD CONSTRAINT "tBonos_pkey" PRIMARY KEY ("id_Bono");


--
-- TOC entry 2200 (class 2606 OID 25817)
-- Name: tCargos tCargos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tCargos"
    ADD CONSTRAINT "tCargos_pkey" PRIMARY KEY ("id_Cargo");


--
-- TOC entry 2202 (class 2606 OID 25819)
-- Name: tComportamiento tComportamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tComportamiento"
    ADD CONSTRAINT "tComportamiento_pkey" PRIMARY KEY ("Rut", "id_Comentario");


--
-- TOC entry 2204 (class 2606 OID 25821)
-- Name: tContratos tContratos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tContratos"
    ADD CONSTRAINT "tContratos_pkey" PRIMARY KEY ("id_Contrato");


--
-- TOC entry 2206 (class 2606 OID 25823)
-- Name: tDescuentos tDescuentos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tDescuentos"
    ADD CONSTRAINT "tDescuentos_pkey" PRIMARY KEY ("id_Descuento");


--
-- TOC entry 2208 (class 2606 OID 25825)
-- Name: tEmpleado_Fono tEmpleado_Fono_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tEmpleado_Fono"
    ADD CONSTRAINT "tEmpleado_Fono_pk" PRIMARY KEY ("Rut", "N_telefono");


--
-- TOC entry 2178 (class 2606 OID 25827)
-- Name: tEmpleados tEmpleados_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tEmpleados"
    ADD CONSTRAINT "tEmpleados_pk" PRIMARY KEY ("Rut");


--
-- TOC entry 2210 (class 2606 OID 25829)
-- Name: tGastos_extra tGastos_extra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tGastos_extra"
    ADD CONSTRAINT "tGastos_extra_pkey" PRIMARY KEY ("id_Gasto");


--
-- TOC entry 2212 (class 2606 OID 25831)
-- Name: tHermanos tHermanos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tHermanos"
    ADD CONSTRAINT "tHermanos_pkey" PRIMARY KEY ("id_Hermano");


--
-- TOC entry 2214 (class 2606 OID 25833)
-- Name: tISAPRE tISAPRE_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tISAPRE"
    ADD CONSTRAINT "tISAPRE_pkey" PRIMARY KEY ("id_ISAPRE");


--
-- TOC entry 2216 (class 2606 OID 25835)
-- Name: tImpuesto tImpuesto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tImpuesto"
    ADD CONSTRAINT "tImpuesto_pkey" PRIMARY KEY ("id_Impuesto");


--
-- TOC entry 2218 (class 2606 OID 25837)
-- Name: tLicencias tLicencias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tLicencias"
    ADD CONSTRAINT "tLicencias_pkey" PRIMARY KEY ("Rut", "id_Licencia");


--
-- TOC entry 2220 (class 2606 OID 25839)
-- Name: tPadres tPadres_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tPadres"
    ADD CONSTRAINT "tPadres_pkey" PRIMARY KEY ("Rut");


--
-- TOC entry 2222 (class 2606 OID 25841)
-- Name: tPago tPago_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tPago"
    ADD CONSTRAINT "tPago_pkey" PRIMARY KEY ("Rut_alu", "Rut_apo");


--
-- TOC entry 2224 (class 2606 OID 25843)
-- Name: tPrestamos tPrestamos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tPrestamos"
    ADD CONSTRAINT "tPrestamos_pkey" PRIMARY KEY ("Rut", "id_Prestamo");


--
-- TOC entry 2226 (class 2606 OID 25845)
-- Name: tSalud tSalud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tSalud"
    ADD CONSTRAINT "tSalud_pkey" PRIMARY KEY ("Rut");


--
-- TOC entry 2228 (class 2606 OID 25847)
-- Name: tUsuarios tUsuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "tUsuarios"
    ADD CONSTRAINT "tUsuarios_pkey" PRIMARY KEY ("Usuario");


--
-- TOC entry 2230 (class 2606 OID 25849)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2232 (class 2606 OID 25851)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


-- Completed on 2017-10-17 08:33:41

--
-- PostgreSQL database dump complete
--


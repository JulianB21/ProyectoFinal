--
-- PostgreSQL database dump
--

-- Dumped from database version 11.0
-- Dumped by pg_dump version 11.0

-- Started on 2018-10-20 08:55:54

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 210 (class 1259 OID 16464)
-- Name: acta_responsabilidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.acta_responsabilidad (
    idacta integer NOT NULL,
    numdocumentoaprendiz integer NOT NULL,
    idequipo integer NOT NULL,
    fechaacta timestamp without time zone NOT NULL
);


ALTER TABLE public.acta_responsabilidad OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16462)
-- Name: acta_responsabilidad_idacta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.acta_responsabilidad_idacta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.acta_responsabilidad_idacta_seq OWNER TO postgres;

--
-- TOC entry 2935 (class 0 OID 0)
-- Dependencies: 209
-- Name: acta_responsabilidad_idacta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.acta_responsabilidad_idacta_seq OWNED BY public.acta_responsabilidad.idacta;


--
-- TOC entry 201 (class 1259 OID 16412)
-- Name: ambiente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ambiente (
    idambiente integer NOT NULL,
    idprograma integer NOT NULL,
    nombreambiente character varying(50) NOT NULL,
    ubicacionambiente character varying(100)
);


ALTER TABLE public.ambiente OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16410)
-- Name: ambiente_idambiente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ambiente_idambiente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ambiente_idambiente_seq OWNER TO postgres;

--
-- TOC entry 2936 (class 0 OID 0)
-- Dependencies: 200
-- Name: ambiente_idambiente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ambiente_idambiente_seq OWNED BY public.ambiente.idambiente;


--
-- TOC entry 208 (class 1259 OID 16457)
-- Name: aprendiz; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aprendiz (
    numdocumentoaprendiz double precision NOT NULL,
    numeroficha integer NOT NULL,
    nombreaprendiz character varying(50) NOT NULL,
    telefonoaprendiz double precision NOT NULL,
    emailaprendiz character varying(50) NOT NULL
);


ALTER TABLE public.aprendiz OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 16474)
-- Name: articulo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.articulo (
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


ALTER TABLE public.articulo OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 16472)
-- Name: articulo_idarticulo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.articulo_idarticulo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.articulo_idarticulo_seq OWNER TO postgres;

--
-- TOC entry 2937 (class 0 OID 0)
-- Dependencies: 211
-- Name: articulo_idarticulo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.articulo_idarticulo_seq OWNED BY public.articulo.idarticulo;


--
-- TOC entry 213 (class 1259 OID 16484)
-- Name: articulonovedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.articulonovedad (
    idarticulo integer NOT NULL,
    idnovedad integer NOT NULL,
    tiponovedad character varying(50) NOT NULL,
    observacionnovedad text
);


ALTER TABLE public.articulonovedad OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16396)
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    idcategoria integer NOT NULL,
    nombrecategoria character varying(50) NOT NULL
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16394)
-- Name: categoria_idcategoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categoria_idcategoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_idcategoria_seq OWNER TO postgres;

--
-- TOC entry 2938 (class 0 OID 0)
-- Dependencies: 196
-- Name: categoria_idcategoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categoria_idcategoria_seq OWNED BY public.categoria.idcategoria;


--
-- TOC entry 205 (class 1259 OID 16435)
-- Name: equipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.equipo (
    idequipo integer NOT NULL,
    nombreequipo character varying(50) NOT NULL,
    estadoequipo text NOT NULL,
    numarticulosequipo character varying(50) NOT NULL,
    observacionequipo character varying(200),
    numarticulosagregados character varying(50)
);


ALTER TABLE public.equipo OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16433)
-- Name: equipo_idequipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.equipo_idequipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipo_idequipo_seq OWNER TO postgres;

--
-- TOC entry 2939 (class 0 OID 0)
-- Dependencies: 204
-- Name: equipo_idequipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.equipo_idequipo_seq OWNED BY public.equipo.idequipo;


--
-- TOC entry 202 (class 1259 OID 16419)
-- Name: ficha; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ficha (
    numeroficha integer NOT NULL,
    idprograma integer NOT NULL,
    idambiente integer NOT NULL,
    fechainicio character varying(50) NOT NULL,
    fechafin character varying(50) NOT NULL,
    jornadaficha character varying(50) NOT NULL
);


ALTER TABLE public.ficha OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16446)
-- Name: novedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.novedad (
    idnovedad integer NOT NULL,
    numdocumentousuario integer NOT NULL,
    usuarionovedad character varying(50) NOT NULL,
    numeroficha integer NOT NULL,
    fechanovedad text NOT NULL,
    articulo character varying(50) NOT NULL
);


ALTER TABLE public.novedad OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16444)
-- Name: novedad_idnovedad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.novedad_idnovedad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.novedad_idnovedad_seq OWNER TO postgres;

--
-- TOC entry 2940 (class 0 OID 0)
-- Dependencies: 206
-- Name: novedad_idnovedad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.novedad_idnovedad_seq OWNED BY public.novedad.idnovedad;


--
-- TOC entry 199 (class 1259 OID 16404)
-- Name: programa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.programa (
    idprograma integer NOT NULL,
    nombreprograma character varying(50) NOT NULL,
    duracionprograma character varying(50) NOT NULL,
    tipoprograma character varying(50)
);


ALTER TABLE public.programa OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16402)
-- Name: programa_idprograma_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.programa_idprograma_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.programa_idprograma_seq OWNER TO postgres;

--
-- TOC entry 2941 (class 0 OID 0)
-- Dependencies: 198
-- Name: programa_idprograma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.programa_idprograma_seq OWNED BY public.programa.idprograma;


--
-- TOC entry 203 (class 1259 OID 16425)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    numdocumentousuario integer NOT NULL,
    idprograma integer,
    nombreusuario character varying(50) NOT NULL,
    contraseniausuario character varying(200) NOT NULL,
    rolusuario character varying(50) NOT NULL,
    fotousuario text
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 2747 (class 2604 OID 16467)
-- Name: acta_responsabilidad idacta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.acta_responsabilidad ALTER COLUMN idacta SET DEFAULT nextval('public.acta_responsabilidad_idacta_seq'::regclass);


--
-- TOC entry 2744 (class 2604 OID 16415)
-- Name: ambiente idambiente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ambiente ALTER COLUMN idambiente SET DEFAULT nextval('public.ambiente_idambiente_seq'::regclass);


--
-- TOC entry 2748 (class 2604 OID 16477)
-- Name: articulo idarticulo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo ALTER COLUMN idarticulo SET DEFAULT nextval('public.articulo_idarticulo_seq'::regclass);


--
-- TOC entry 2742 (class 2604 OID 16399)
-- Name: categoria idcategoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria ALTER COLUMN idcategoria SET DEFAULT nextval('public.categoria_idcategoria_seq'::regclass);


--
-- TOC entry 2745 (class 2604 OID 16438)
-- Name: equipo idequipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipo ALTER COLUMN idequipo SET DEFAULT nextval('public.equipo_idequipo_seq'::regclass);


--
-- TOC entry 2746 (class 2604 OID 16449)
-- Name: novedad idnovedad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedad ALTER COLUMN idnovedad SET DEFAULT nextval('public.novedad_idnovedad_seq'::regclass);


--
-- TOC entry 2743 (class 2604 OID 16407)
-- Name: programa idprograma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.programa ALTER COLUMN idprograma SET DEFAULT nextval('public.programa_idprograma_seq'::regclass);


--
-- TOC entry 2926 (class 0 OID 16464)
-- Dependencies: 210
-- Data for Name: acta_responsabilidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.acta_responsabilidad (idacta, numdocumentoaprendiz, idequipo, fechaacta) FROM stdin;
\.


--
-- TOC entry 2917 (class 0 OID 16412)
-- Dependencies: 201
-- Data for Name: ambiente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ambiente (idambiente, idprograma, nombreambiente, ubicacionambiente) FROM stdin;
\.


--
-- TOC entry 2924 (class 0 OID 16457)
-- Dependencies: 208
-- Data for Name: aprendiz; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aprendiz (numdocumentoaprendiz, numeroficha, nombreaprendiz, telefonoaprendiz, emailaprendiz) FROM stdin;
\.


--
-- TOC entry 2928 (class 0 OID 16474)
-- Dependencies: 212
-- Data for Name: articulo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.articulo (idarticulo, idambiente, idequipo, idcategoria, tipoarticulo, modeloarticulo, marcaarticulo, caracteristicaarticulo, estadoarticulo, numinventariosena, serialarticulo) FROM stdin;
\.


--
-- TOC entry 2929 (class 0 OID 16484)
-- Dependencies: 213
-- Data for Name: articulonovedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.articulonovedad (idarticulo, idnovedad, tiponovedad, observacionnovedad) FROM stdin;
\.


--
-- TOC entry 2913 (class 0 OID 16396)
-- Dependencies: 197
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categoria (idcategoria, nombrecategoria) FROM stdin;
\.


--
-- TOC entry 2921 (class 0 OID 16435)
-- Dependencies: 205
-- Data for Name: equipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.equipo (idequipo, nombreequipo, estadoequipo, numarticulosequipo, observacionequipo, numarticulosagregados) FROM stdin;
\.


--
-- TOC entry 2918 (class 0 OID 16419)
-- Dependencies: 202
-- Data for Name: ficha; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ficha (numeroficha, idprograma, idambiente, fechainicio, fechafin, jornadaficha) FROM stdin;
\.


--
-- TOC entry 2923 (class 0 OID 16446)
-- Dependencies: 207
-- Data for Name: novedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.novedad (idnovedad, numdocumentousuario, usuarionovedad, numeroficha, fechanovedad, articulo) FROM stdin;
\.


--
-- TOC entry 2915 (class 0 OID 16404)
-- Dependencies: 199
-- Data for Name: programa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.programa (idprograma, nombreprograma, duracionprograma, tipoprograma) FROM stdin;
1	ADSI	12 MESES	TÉCNICO
\.


--
-- TOC entry 2919 (class 0 OID 16425)
-- Dependencies: 203
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (numdocumentousuario, idprograma, nombreusuario, contraseniausuario, rolusuario, fotousuario) FROM stdin;
123	\N	ADMINISTRADOR	c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec	ADMINISTRADOR	
\.


--
-- TOC entry 2942 (class 0 OID 0)
-- Dependencies: 209
-- Name: acta_responsabilidad_idacta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.acta_responsabilidad_idacta_seq', 1, false);


--
-- TOC entry 2943 (class 0 OID 0)
-- Dependencies: 200
-- Name: ambiente_idambiente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ambiente_idambiente_seq', 1, false);


--
-- TOC entry 2944 (class 0 OID 0)
-- Dependencies: 211
-- Name: articulo_idarticulo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.articulo_idarticulo_seq', 1, false);


--
-- TOC entry 2945 (class 0 OID 0)
-- Dependencies: 196
-- Name: categoria_idcategoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_idcategoria_seq', 1, false);


--
-- TOC entry 2946 (class 0 OID 0)
-- Dependencies: 204
-- Name: equipo_idequipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.equipo_idequipo_seq', 1, false);


--
-- TOC entry 2947 (class 0 OID 0)
-- Dependencies: 206
-- Name: novedad_idnovedad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.novedad_idnovedad_seq', 1, false);


--
-- TOC entry 2948 (class 0 OID 0)
-- Dependencies: 198
-- Name: programa_idprograma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.programa_idprograma_seq', 1, true);


--
-- TOC entry 2770 (class 2606 OID 16469)
-- Name: acta_responsabilidad acta_responsabilidad_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.acta_responsabilidad
    ADD CONSTRAINT acta_responsabilidad_pk PRIMARY KEY (idacta);


--
-- TOC entry 2754 (class 2606 OID 16417)
-- Name: ambiente ambiente_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ambiente
    ADD CONSTRAINT ambiente_pk PRIMARY KEY (idambiente);


--
-- TOC entry 2768 (class 2606 OID 16565)
-- Name: aprendiz aprendiz_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aprendiz
    ADD CONSTRAINT aprendiz_pk PRIMARY KEY (numdocumentoaprendiz);


--
-- TOC entry 2774 (class 2606 OID 16482)
-- Name: articulo articulo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_pk PRIMARY KEY (idarticulo);


--
-- TOC entry 2777 (class 2606 OID 16491)
-- Name: articulonovedad articulonovedad_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulonovedad
    ADD CONSTRAINT articulonovedad_pk PRIMARY KEY (idarticulo, idnovedad);


--
-- TOC entry 2750 (class 2606 OID 16401)
-- Name: categoria categoria_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pk PRIMARY KEY (idcategoria);


--
-- TOC entry 2762 (class 2606 OID 16443)
-- Name: equipo equipo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipo
    ADD CONSTRAINT equipo_pk PRIMARY KEY (idequipo);


--
-- TOC entry 2757 (class 2606 OID 16423)
-- Name: ficha ficha_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ficha
    ADD CONSTRAINT ficha_pk PRIMARY KEY (numeroficha);


--
-- TOC entry 2764 (class 2606 OID 16454)
-- Name: novedad novedad_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedad
    ADD CONSTRAINT novedad_pk PRIMARY KEY (idnovedad);


--
-- TOC entry 2752 (class 2606 OID 16409)
-- Name: programa programa_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.programa
    ADD CONSTRAINT programa_pk PRIMARY KEY (idprograma);


--
-- TOC entry 2760 (class 2606 OID 16589)
-- Name: usuario usuario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pk PRIMARY KEY (numdocumentousuario);


--
-- TOC entry 2758 (class 1259 OID 16424)
-- Name: idambiente; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idambiente ON public.ficha USING btree (idambiente);


--
-- TOC entry 2775 (class 1259 OID 16483)
-- Name: idcategoria; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idcategoria ON public.articulo USING btree (idcategoria);


--
-- TOC entry 2771 (class 1259 OID 16471)
-- Name: idequipo; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idequipo ON public.acta_responsabilidad USING btree (idequipo);


--
-- TOC entry 2778 (class 1259 OID 16492)
-- Name: idnovedad; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idnovedad ON public.articulonovedad USING btree (idnovedad);


--
-- TOC entry 2755 (class 1259 OID 16418)
-- Name: idprograma; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idprograma ON public.ambiente USING btree (idprograma);


--
-- TOC entry 2772 (class 1259 OID 16470)
-- Name: numdocumentoaprendiz; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX numdocumentoaprendiz ON public.acta_responsabilidad USING btree (numdocumentoaprendiz);


--
-- TOC entry 2765 (class 1259 OID 16455)
-- Name: numdocumentousuario; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX numdocumentousuario ON public.novedad USING btree (numdocumentousuario);


--
-- TOC entry 2766 (class 1259 OID 16456)
-- Name: numeroficha; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX numeroficha ON public.novedad USING btree (numeroficha);


--
-- TOC entry 2785 (class 2606 OID 16566)
-- Name: acta_responsabilidad acta_responsabilidad_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.acta_responsabilidad
    ADD CONSTRAINT acta_responsabilidad_ibfk_1 FOREIGN KEY (numdocumentoaprendiz) REFERENCES public.aprendiz(numdocumentoaprendiz);


--
-- TOC entry 2784 (class 2606 OID 16533)
-- Name: acta_responsabilidad acta_responsabilidad_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.acta_responsabilidad
    ADD CONSTRAINT acta_responsabilidad_ibfk_2 FOREIGN KEY (idequipo) REFERENCES public.equipo(idequipo);


--
-- TOC entry 2779 (class 2606 OID 16503)
-- Name: ambiente ambiente_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ambiente
    ADD CONSTRAINT ambiente_ibfk_1 FOREIGN KEY (idprograma) REFERENCES public.programa(idprograma);


--
-- TOC entry 2783 (class 2606 OID 16523)
-- Name: aprendiz aprendiz_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aprendiz
    ADD CONSTRAINT aprendiz_ibfk_1 FOREIGN KEY (numeroficha) REFERENCES public.ficha(numeroficha);


--
-- TOC entry 2787 (class 2606 OID 16513)
-- Name: articulo articulo_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_ibfk_1 FOREIGN KEY (idambiente) REFERENCES public.ambiente(idambiente);


--
-- TOC entry 2788 (class 2606 OID 16528)
-- Name: articulo articulo_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_ibfk_2 FOREIGN KEY (idequipo) REFERENCES public.equipo(idequipo);


--
-- TOC entry 2786 (class 2606 OID 16493)
-- Name: articulo articulo_ibfk_3; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT articulo_ibfk_3 FOREIGN KEY (idcategoria) REFERENCES public.categoria(idcategoria);


--
-- TOC entry 2790 (class 2606 OID 16548)
-- Name: articulonovedad articulonovedad_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulonovedad
    ADD CONSTRAINT articulonovedad_ibfk_1 FOREIGN KEY (idarticulo) REFERENCES public.articulo(idarticulo);


--
-- TOC entry 2789 (class 2606 OID 16538)
-- Name: articulonovedad articulonovedad_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulonovedad
    ADD CONSTRAINT articulonovedad_ibfk_2 FOREIGN KEY (idnovedad) REFERENCES public.novedad(idnovedad);


--
-- TOC entry 2780 (class 2606 OID 16508)
-- Name: ficha ficha_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ficha
    ADD CONSTRAINT ficha_ibfk_1 FOREIGN KEY (idprograma) REFERENCES public.programa(idprograma);


--
-- TOC entry 2781 (class 2606 OID 16518)
-- Name: ficha ficha_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ficha
    ADD CONSTRAINT ficha_ibfk_2 FOREIGN KEY (idambiente) REFERENCES public.ambiente(idambiente);


--
-- TOC entry 2782 (class 2606 OID 16498)
-- Name: usuario usuario_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_ibfk_1 FOREIGN KEY (idprograma) REFERENCES public.programa(idprograma);


-- Completed on 2018-10-20 08:55:54

--
-- PostgreSQL database dump complete
--


-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- PostgreSQL version: 9.2
-- Project Site: pgmodeler.com.br
-- Model Author: ---

SET check_function_bodies = false;
-- ddl-end --


-- Database creation must be done outside an multicommand file.
-- These commands were put in this file only for convenience.
-- -- object: new_database | type: DATABASE --
-- CREATE DATABASE new_database
-- ;
-- -- ddl-end --
-- 

-- object: public.ruta | type: TABLE --
CREATE TABLE public.ruta(
	id serial,
	cod character varying(10) NOT NULL,
	nombre character varying(255) NOT NULL,
	CONSTRAINT pk_rutas PRIMARY KEY (id)

);
-- ddl-end --
-- object: public.ruta_ciudad | type: TABLE --
CREATE TABLE public.ruta_ciudad(
	id_ruta int2 NOT NULL,
	id_ciudad int2 NOT NULL,
	CONSTRAINT pk_ruta_ciudad PRIMARY KEY (id_ruta,id_ciudad)

);
-- ddl-end --
-- object: public.ciudad | type: TABLE --
CREATE TABLE public.ciudad(
	id serial NOT NULL,
	cod character varying(10) NOT NULL,
	nombre character varying(255) NOT NULL,
	CONSTRAINT pk_ciudad PRIMARY KEY (id)

);
-- ddl-end --
-- object: public.usuario | type: TABLE --
CREATE TABLE public.usuario(
	id serial,
	nombre character varying(255) NOT NULL,
	email character varying(255) NOT NULL,
	pass character varying(255) NOT NULL,
	token character varying(255),
	activo boolean NOT NULL DEFAULT true,
	fecha_creacion timestamp without time zone NOT NULL DEFAULT now(),
	CONSTRAINT pk_usuario PRIMARY KEY (id)

);
-- ddl-end --
-- object: public.vehiculo | type: TABLE --
CREATE TABLE public.vehiculo(
	id serial NOT NULL,
	id_usuario int2 NOT NULL,
	patente character varying(255) NOT NULL,
	descripcion character varying(255),
	CONSTRAINT pk_vehiculo PRIMARY KEY (id)

);
-- ddl-end --
-- object: public.tramo | type: TABLE --
CREATE TABLE public.tramo(
	id serial NOT NULL,
	id_ruta int2 NOT NULL,
	correlativo int2 NOT NULL,
	ciudad_origen int2 NOT NULL,
	ciudad_destino int2 NOT NULL,
	distancia double precision NOT NULL,
	velocidad_promedio float NOT NULL,
	CONSTRAINT pk_tramo PRIMARY KEY (id)

);
-- ddl-end --
-- object: public.viaje | type: TABLE --
CREATE TABLE public.viaje(
	id serial NOT NULL,
	correlativo int2 NOT NULL,
	id_vehiculo int2 NOT NULL,
	id_usuario int2 NOT NULL,
	fecha_salida date NOT NULL,
	hora_salida time without time zone NOT NULL,
	id_tramo int2,
	sentido smallint NOT NULL,
	CONSTRAINT pk_viaje PRIMARY KEY (id)

);
-- ddl-end --
-- object: fk_ruta_ciudad | type: CONSTRAINT --
ALTER TABLE public.ruta_ciudad ADD CONSTRAINT fk_ruta_ciudad FOREIGN KEY (id_ruta)
REFERENCES public.ruta (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --

-- object: fk_ruta_ciudad | type: CONSTRAINT --
ALTER TABLE public.viaje ADD CONSTRAINT fk_viaje_usuario FOREIGN KEY (id_usuario)
REFERENCES public.usuario (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_ciudad_ruta | type: CONSTRAINT --
ALTER TABLE public.ruta_ciudad ADD CONSTRAINT fk_ciudad_ruta FOREIGN KEY (id_ciudad)
REFERENCES public.ciudad (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_usuario_vehiculo | type: CONSTRAINT --
ALTER TABLE public.vehiculo ADD CONSTRAINT fk_usuario_vehiculo FOREIGN KEY (id_usuario)
REFERENCES public.usuario (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_tramo_ciudad_origen | type: CONSTRAINT --
ALTER TABLE public.tramo ADD CONSTRAINT fk_tramo_ciudad_origen FOREIGN KEY (ciudad_origen)
REFERENCES public.ciudad (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_tramo_ciudad_destino | type: CONSTRAINT --
ALTER TABLE public.tramo ADD CONSTRAINT fk_tramo_ciudad_destino FOREIGN KEY (ciudad_destino)
REFERENCES public.ciudad (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_tramo_ruta | type: CONSTRAINT --
ALTER TABLE public.tramo ADD CONSTRAINT fk_tramo_ruta FOREIGN KEY (id_ruta)
REFERENCES public.ruta (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_viaje_tramo | type: CONSTRAINT --
ALTER TABLE public.viaje ADD CONSTRAINT fk_viaje_tramo FOREIGN KEY (id_tramo)
REFERENCES public.tramo (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --


-- object: fk_viaje_vehiculo | type: CONSTRAINT --
ALTER TABLE public.viaje ADD CONSTRAINT fk_viaje_vehiculo FOREIGN KEY (id_vehiculo)
REFERENCES public.vehiculo (id) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION NOT DEFERRABLE;
-- ddl-end --




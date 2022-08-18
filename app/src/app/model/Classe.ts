import { AnneeAcademique } from "./AnneeAcademique";
import { Niveau } from "./Niveau";
import { Specialite } from "./Specialite";

export class Classe{
  id: number | undefined;
  libelle: string | undefined;
  specialite: Specialite = Object.create(null);
  niveau: Niveau = Object.create(null);
  annee_academique: AnneeAcademique = Object.create(null);
}

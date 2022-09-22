import { Classe } from "./Classe";

export class Cours{
  id: number | undefined;
  name: string | undefined;
  libelle_classe: string | undefined;
  classe: Classe = Object.create(null);
}

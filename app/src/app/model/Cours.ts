import { Classe } from "./Classe";

export class Cours{
  id: number | undefined;
  name: string | undefined;
  classe: Classe = Object.create(null);
}

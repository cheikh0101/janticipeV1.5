import { Classe } from "./Classe";
import { Cours } from "./Cours";

export class Document{
  id: number | undefined;
  name?: string;
  description?: string;
  classe: Classe = Object.create(null);
  cours: Cours = Object.create(null);
}

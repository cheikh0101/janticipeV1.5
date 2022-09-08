import { Classe } from "./Classe";
import { Cours } from "./Cours";
import { Type } from "./Type";
import { User } from "./User";

export class Document{
  id: number | undefined;
  name: string | undefined;
  description: string | undefined;
  file: string | undefined;
  document_path: string | undefined;
  created_at: string | undefined;
  classe: Classe = Object.create(null);
  cours: Cours = Object.create(null);
  user: User = Object.create(null);
  type: Type = Object.create(null);
}

import { Injectable } from '@angular/core';
import { Classe } from '../model/Classe';
import { BaseService } from './base.service';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export class ClassService extends BaseService<Classe> {

  constructor(public override http: JanticipeHttpService) {
    super(http);
    this.prefix = 'classe';
  }

  filtreClasseParNiveaux(id : number) {
    return this.http.get(this.prefix  +'/filtre/niveaux/'+id);
  }

  filtreClasseParAnneeAcademique(id : number) {
    return this.http.get(this.prefix  +'/filtre/annee_academique/'+id);
  }

  filtreClasseParSpecialite(id : number) {
    return this.http.get(this.prefix  +'/filtre/specialite/'+id);
  }
}

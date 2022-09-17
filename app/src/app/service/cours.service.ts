import { Injectable } from '@angular/core';
import { Cours } from '../model/Cours';
import { Niveau } from '../model/Niveau';
import { BaseService } from './base.service';
import { JanticipeHttpService } from './janticipe-http.service';

@Injectable({
  providedIn: 'root'
})
export class CoursService extends BaseService<Cours> {

  constructor(public override http: JanticipeHttpService) {
    super(http);
    this.prefix = 'cours';
  }

  filtreCoursParNiveaux(id : number) {
    return this.http.get(this.prefix  +'/filtre/niveaux/'+id);
  }

  filtreCoursParAnneeAcademique(id : number) {
    return this.http.get(this.prefix  +'/filtre/annee_academique/'+id);
  }

}

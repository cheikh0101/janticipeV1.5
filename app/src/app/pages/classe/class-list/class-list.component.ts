import { Component, OnInit } from '@angular/core';
import { AnneeAcademique } from 'src/app/model/AnneeAcademique';
import { Classe } from 'src/app/model/Classe';
import { Niveau } from 'src/app/model/Niveau';
import { Specialite } from 'src/app/model/Specialite';
import { ClassService } from 'src/app/service/class.service';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-class-list',
  templateUrl: './class-list.component.html',
  styleUrls: ['./class-list.component.css']
})
export class ClassListComponent implements OnInit {

  classes: Classe[] = [];
  niveaux: Niveau[] = [];
  selectedNiveaux: number = 0;
  selectedAnneeAcademique: number = 0;
  selectedSpecialite: number = 0;
  anneeAcademiques: AnneeAcademique[] = [];
  specialites: Specialite[] = [];
  searchField: any = { libelle: '' };

  constructor(public indexSrv: IndexService, public classeSrv: ClassService) { }

  ngOnInit(): void {
    this.findAllAnneeAcademique();
    this.findAllLevels();
    this.findAllSpecialites();
    this.findAllClasses();
  }

  findAllLevels() {
    this.indexSrv
      .getNiveaux()
      .then((data: Niveau[]) => {
        this.niveaux = data;
      })
      .catch(() => {});
  }

  findAllAnneeAcademique() {
    this.indexSrv
      .getAnneeAcademique()
      .then((data: AnneeAcademique[]) => {
        this.anneeAcademiques = data;
      })
      .catch(() => {});
  }

  findAllSpecialites() {
    this.indexSrv
      .getSpecialites()
      .then((data: Specialite[]) => {
        this.specialites = data;
      })
      .catch(() => {});
  }

  findAllClasses() {
    this.indexSrv
      .getClasse()
      .then((data: Classe[]) => {
        this.classes = data;
      })
      .catch(() => {});
  }

  filtreClasseParNiveaux() {
    this.classeSrv
      .filtreClasseParNiveaux(this.selectedNiveaux)
      .then((data: Classe[]) => {
        this.classes = data;
        if (this.classes.length == 0) {
          this.indexSrv.http.toastr.info(
            'Aucune classe disponible pour ce niveau'
          );
          this.selectedAnneeAcademique = 0;
          this.selectedNiveaux = 0;
          this.selectedSpecialite = 0;
        } else {
          this.selectedAnneeAcademique = 0;
          this.selectedSpecialite = 0;
        }
      })
      .catch(() => {});
  }

  filtreClasseParAnneeAcademique() {
    this.classeSrv
      .filtreClasseParAnneeAcademique(this.selectedAnneeAcademique)
      .then((data: Classe[]) => {
        this.classes = data;
        if (this.classes.length == 0) {
          this.indexSrv.http.toastr.info(
            "Aucune classe disponible pour l'année académique choisit! "
          );
          this.selectedNiveaux = 0;
          this.selectedAnneeAcademique = 0;
          this.selectedSpecialite = 0;
        } else {
          this.selectedNiveaux = 0;
          this.selectedSpecialite = 0;
        }
      })
      .catch(() => {});
  }

  filtreClasseParSpecialite() {
    this.classeSrv
      .filtreClasseParSpecialite(this.selectedSpecialite)
      .then((data: Classe[]) => {
        this.classes = data;
        if (this.classes.length == 0) {
          this.indexSrv.http.toastr.info(
            "Aucune classe disponible pour la spécialité choisit! "
          );
          this.selectedNiveaux = 0;
          this.selectedAnneeAcademique = 0;
          this.selectedSpecialite = 0;
        } else {
          this.selectedNiveaux = 0;
          this.selectedAnneeAcademique = 0;
        }
      })
      .catch(() => {});
  }
}

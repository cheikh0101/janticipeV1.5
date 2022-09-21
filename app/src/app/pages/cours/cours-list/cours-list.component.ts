import { Component, OnInit } from '@angular/core';
import { AnneeAcademique } from 'src/app/model/AnneeAcademique';
import { Classe } from 'src/app/model/Classe';
import { Cours } from 'src/app/model/Cours';
import { Niveau } from 'src/app/model/Niveau';
import { CoursService } from 'src/app/service/cours.service';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-cours-list',
  templateUrl: './cours-list.component.html',
  styleUrls: ['./cours-list.component.css'],
})
export class CoursListComponent implements OnInit {
  cours: Cours[] = [];
  niveaux: Niveau[] = [];
  selectedNiveaux: number = 0;
  selectedAnneeAcademique: number = 0;
  selectedClasse: number = 0;
  anneeAcademiques: AnneeAcademique[] = [];
  classes: Classe[] = [];
  itemsPerPage = 18;
  paginationData: any = {};
  pageSizeOptions = [10, 40, 80, 100];
  searchField: any = { name: '' };

  constructor(public coursSrv: CoursService, public indexSrv: IndexService) {}

  ngOnInit(): void {
    this.paginate();
    this.findAllLevels();
    this.findAllAnneeAcademique();
    this.findAllClasses();
  }

  findAll() {
    this.coursSrv
      .findAll()
      .then((data: Cours[]) => {
        this.cours = data;
      })
      .catch(() => {});
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

  findAllClasses() {
    this.indexSrv
      .getClasse()
      .then((data: Classe[]) => {
        this.classes = data;
      })
      .catch(() => {});
  }

  filtreCoursParNiveaux() {
    this.coursSrv
      .filtreCoursParNiveaux(this.selectedNiveaux)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
        if (this.cours.length == 0) {
          this.indexSrv.http.toastr.info(
            'Aucun cours disponible pour ce niveau'
          );
          this.selectedAnneeAcademique = 0;
          this.selectedNiveaux = 0;
          this.selectedClasse = 0;
        } else {
          this.selectedAnneeAcademique = 0;
          this.selectedClasse = 0;
        }
      })
      .catch(() => {});
  }

  filtreCoursParAnneeAcademique() {
    this.coursSrv
      .filtreCoursParAnneeAcademique(this.selectedAnneeAcademique)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
        if (this.cours.length == 0) {
          this.indexSrv.http.toastr.info(
            "Aucun cours disponible pour l'année académique choisit! "
          );
          this.selectedNiveaux = 0;
          this.selectedAnneeAcademique = 0;
          this.selectedClasse = 0;
        } else {
          this.selectedNiveaux = 0;
          this.selectedClasse = 0;
        }
      })
      .catch(() => {});
  }

  filtreCoursParClasse() {
    this.coursSrv
      .filtreCoursParClasse(this.selectedClasse)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
        if (this.cours.length == 0) {
          this.indexSrv.http.toastr.info(
            "Aucun cours disponible pour la classe choisit! "
          );
          this.selectedNiveaux = 0;
          this.selectedAnneeAcademique = 0;
          this.selectedClasse = 0;
        } else {
          this.selectedNiveaux = 0;
          this.selectedAnneeAcademique = 0;
        }
      })
      .catch(() => {});
  }
  paginate() {
    this.coursSrv
      .paginate(this.itemsPerPage)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
      })
      .catch(() => {});
  }

  changePageSize(itemsPerPage: number) {
    this.itemsPerPage = itemsPerPage;
    this.coursSrv
      .paginate(this.itemsPerPage)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
      })
      .catch(() => {});
  }

  changePagination(pageNumber: any) {
    this.coursSrv
      .paginate(this.itemsPerPage, pageNumber)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
      })
      .catch(() => {});
  }
}

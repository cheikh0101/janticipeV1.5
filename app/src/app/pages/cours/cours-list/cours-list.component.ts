import { Component, OnInit } from '@angular/core';
import { AnneeAcademique } from 'src/app/model/AnneeAcademique';
import { Cours } from 'src/app/model/Cours';
import { Niveau } from 'src/app/model/Niveau';
import { CoursService } from 'src/app/service/cours.service';
import { IndexService } from 'src/app/service/index.service';

@Component({
  selector: 'app-cours-list',
  templateUrl: './cours-list.component.html',
  styleUrls: ['./cours-list.component.css']
})
export class CoursListComponent implements OnInit {

  cours: Cours[] = [];
  niveaux: Niveau[] = [];
  selectedNiveaux: number = 0;
  selectedAnneeAcademique: number = 0;
  anneeAcademiques: AnneeAcademique[] = [];
  itemsPerPage = 9;
  paginationData: any = {};

  constructor(public coursSrv: CoursService, public indexSrv: IndexService) { }

  ngOnInit(): void {
    this.findAll();
    this.findAllLevels();
    this.findAllAnneeAcademique();
  }

  findAll(){
    this.coursSrv.findAll()
    .then((data: Cours[]) => {
        this.cours = data;
      })
      .catch(() => { });
  }

  findAllLevels(){
    this.indexSrv.getNiveaux()
    .then((data: Niveau[]) => {
        this.niveaux = data;
      })
      .catch(() => { });
  }

  findAllAnneeAcademique(){
    this.indexSrv.getAnneeAcademique()
    .then((data: AnneeAcademique[]) => {
        this.anneeAcademiques = data;
      })
      .catch(() => { });
  }

  filtreCoursParNiveaux() {
    console.log(this.selectedNiveaux);
    this.coursSrv.filtreCoursParNiveaux(this.selectedNiveaux)
      .then((data: Cours[]) => {
        if (data.length == 0) {
          this.indexSrv.http.toastr.info('Aucun cours disponible pour ce niveau');
          this.findAll();
      } else {
        this.cours = data;
      }
    })
    .catch(() => { });
  }

  filtreCoursParAnneeAcademique() {
    this.coursSrv.filtreCoursParAnneeAcademique(this.selectedAnneeAcademique)
      .then((data: Cours[]) => {
        if (data.length == 0) {
          this.indexSrv.http.toastr.info('Aucun cours disponible pour l\'année académique choisit! ');
          this.findAll();
        } else {
          this.cours = data;
        }
    })
    .catch(() => { });
  }

  paginate() {
    this.coursSrv.paginate(this.itemsPerPage)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
      })
      .catch(() => { });
  }

  changePageSize(itemsPerPage: number) {
    this.itemsPerPage = itemsPerPage;
    this.coursSrv.paginate(this.itemsPerPage)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
      })
      .catch(() => { });
  }

  changePagination(pageNumber: any) {
    this.coursSrv.paginate(this.itemsPerPage, pageNumber)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
      })
      .catch(() => { });
  }

}

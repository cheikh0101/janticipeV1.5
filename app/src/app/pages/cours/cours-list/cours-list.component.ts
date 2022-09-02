import { Component, OnInit } from '@angular/core';
import { Cours } from 'src/app/model/Cours';
import { CoursService } from 'src/app/service/cours.service';

@Component({
  selector: 'app-cours-list',
  templateUrl: './cours-list.component.html',
  styleUrls: ['./cours-list.component.css']
})
export class CoursListComponent implements OnInit {

  cours: Cours[] = [];
  itemsPerPage = 9;
  paginationData: any = {};

  constructor(public coursSrv: CoursService) { }

  ngOnInit(): void {
    this.findAll();
    this.paginate();
  }

  findAll(){
    this.coursSrv.findAll()
    .then((data: Cours[]) => {
        this.cours = data;
      })
      .catch(() => { });
  }

  paginate() {
    this.coursSrv.paginate(this.itemsPerPage)
      .then((data: Cours[]) => {
        this.paginationData = data;
        this.cours = this.paginationData.data;
        console.log(this.cours);

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

import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Cours } from 'src/app/model/Cours';
import { Document } from 'src/app/model/Document';
import { Type } from 'src/app/model/Type';
import { CoursService } from 'src/app/service/cours.service';
import { DocumentService } from 'src/app/service/document.service';
import { IndexService } from 'src/app/service/index.service';

import {NgbModal} from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'app-cours-show',
  templateUrl: './cours-show.component.html',
  styleUrls: ['./cours-show.component.css']
})
export class CoursShowComponent implements OnInit {

  pdfSrc:any = "";
  cours: Cours;
  types: Type[] = [];
  documents: Document[] = [];



  constructor( public activatedRoute: ActivatedRoute, public coursSrv: CoursService, public indexSrv:IndexService, public documentSrv: DocumentService, private modalService: NgbModal) {
    this.cours = Object.create(null);
   }

  ngOnInit(): void {
    this.findCours();
    this.getAllTypes();
    this.getCourseDocument();
  }

  findCours() {
    this.coursSrv.findOneById(this.activatedRoute.snapshot.params["id"])
      .then((data: any) => {
        this.cours = data;
      })
      .catch(() => { })
  }

  getAllTypes() {
    this.indexSrv.getTypes()
      .then((data:any) => {
        this.types = data;
      } )
  }

  getCourseDocument() {
    this.documentSrv.findCourseDocument(this.activatedRoute.snapshot.params["id"])
      .then((data:any) => {
        this.documents = data;
    console.log(this.documents);

    } )
  }

  open(content:any, document:Document) {
    this.modalService.open(content, { size: 'xl', scrollable: true, centered: true }).result.then((result) => {

    }, (reason) => {
      this.pdfSrc = document.file;
    });
  }
}

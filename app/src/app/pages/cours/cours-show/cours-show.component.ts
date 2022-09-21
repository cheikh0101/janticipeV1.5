import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Cours } from 'src/app/model/Cours';
import { Document } from 'src/app/model/Document';
import { Type } from 'src/app/model/Type';
import { CoursService } from 'src/app/service/cours.service';
import { DocumentService } from 'src/app/service/document.service';
import { IndexService } from 'src/app/service/index.service';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-cours-show',
  templateUrl: './cours-show.component.html',
  styleUrls: ['./cours-show.component.css']
})
export class CoursShowComponent implements OnInit {

  // pdfSrc = "https://vadimdez.github.io/ng2-pdf-viewer/assets/pdf-test.pdf";
  pdfSrc: any;
  cours: Cours;
  types: Type[] = [];
  documents: Document[] = [];
  selectedType: number = 0;
  coursId: number = this.activatedRoute.snapshot.params["id"];
  searchField: any = { name: '' };
  isVisible = false;

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
    } )
  }

  filtreDocumentParType() {
    this.documentSrv.filtreDocumentParType(this.selectedType, this.coursId)
      .then((data: Document[]) => {
        if (data.length == 0) {
          this.indexSrv.http.toastr.info('Aucun document disponible pour ce type. N\'hésitez pas à nous contacter pour des suggestions!');
          this.getCourseDocument();
          this.selectedType = 0;
        } else {
          this.documents = data;
        }
    })
    .catch(() => { });
  }

  showModal(document:Document): void {
    this.isVisible = true;
    this.pdfSrc = document.document_path;
  }

  handleOk(): void {
    this.isVisible = false;
  }

  handleCancel(): void {
    this.isVisible = false;
  }
}

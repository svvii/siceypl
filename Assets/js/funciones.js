let tblUsuarios,tblLectores,
  tblGeneraciones, tblCarrerass,tblRoles, tblPrestamos, tblEstadias, tbllibro,tblBALLEZA,tblAutores,tblESTUDIANTES,tblEditoriales,tblLIBROB,tblDocumentos,t_prestamos;
document.addEventListener("DOMContentLoaded", function () {
  //ajax selec2
  $(".select_autor").select2({
    dropdownParent: $('#nuevo_librob'),
    ajax: {
      url: base_url + 'Autores/select_autores',
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          autores: params.term
        };
      },
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    },
    placeholder: 'Buscar Autor',
    minimumInputLength: 2,
  });
  //editorial
  $(".select_editorial").select2({
    dropdownParent: $('#nuevo_librob'),
    ajax: {
      url: base_url + 'Editoriales/select_editorial',
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          editorial: params.term
        };
      },
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    },
    placeholder: 'Buscar Editorial',
    minimumInputLength: 2,
  });
  //fin select editorial 
  $(".select_est").select2({
    dropdownParent: $('#nuevo_prestamodelibro'),
    ajax: {
      url: base_url + 'Estudiantes/select_estudiantes',
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          estudiante: params.term
        };
      },
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    },
    placeholder: 'Buscar Estudiante',
    minimumInputLength: 2,
  });
  //fin estudiante
  $(".select_libro").select2({
    dropdownParent: $('#nuevo_prestamodelibro'),
    ajax: {
      url: base_url + 'Libros_biblioteca/select_lib',
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          libr: params.term
        };
      },
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    },
    placeholder: 'Buscar Libro',
    minimumInputLength: 2,
  });

  tblUsuarios = $("#tblUsuarios").DataTable({
    ajax: {
      url: base_url + "Usuarios/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "usuario",
      },
      {
        data: "nombre",
      },
      {
        data: "caja",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [
        // Botón para Excel
        {
          extend: "excelHtml5",
          footer: true,
          title: "Exportar a Excel",
          filename: "Export_File",
          text: '<span class="badge badge-success" style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
        },
        // Botón para PDF
        {
          extend: "pdfHtml5",
          download: "open",
          footer: true,
          title: "Exportar a PDF",
          filename: "Reporte de usuarios",
          text: '<span class="badge badge-danger" style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
          exportOptions: {
            columns: [0, ":visible"],
          },
        },
        // Botón para print
        {
          extend: "print",
          footer: true,
          filename: "Export_File_print",
          title: "Imprimir",
          text: '<span class="badge badge-light" style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
        },
        // Botón para CVS
        {
          extend: "csvHtml5",
          footer: true,
          filename: "Export_File_csv",
          text: '<span class="badge badge-success" style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
        },
        // Botón para mostrar/ocultar columnas
        {
          extend: "colvis",
          title: "Mostrar/Ocultar Columnas",
          text: '<span class="badge badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
          postfixButtons: ["colvisRestore"],
        },
      ],
      
      
      
  });
  //FIN DE LA TABLA USUARIOS
  tblCarrerass = $("#tblCarrerass").DataTable({
    ajax: {
      url: base_url + "Carrerass/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "abreviatura",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.5em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  //FIN DE LA TABLA CARRERASS
  tblLectores = $("#tblLectores").DataTable({
    ajax: {
      url: base_url + "Lectores/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "dni",
      },
      {
        data: "nombre",
      },
      {
        data: "telefono",
      },
      {
        data: "direccion",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
     
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  //FIN TABLA LECTORES
  tblGeneraciones = $("#tblGeneraciones").DataTable({
    ajax: {
      url: base_url + "Generaciones/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "inicio",
      },
      {
        data: "final",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
 
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  //FIN TABLA GENERACIONES
  tblRoles = $("#tblRoles").DataTable({
    ajax: {
      url: base_url + "Roles/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "caja",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para copiar
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light" style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  //FIN TABLA ROLES
  tblPrestamos = $("#tblPrestamos").DataTable({
    ajax: {
      url: base_url + "Prestamos/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "lectror",
      },
      {
        data: "fecha_prestamo",
      },
      {
        data: "fecha_devolucion",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },

      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  //FIN TABLA PRESTAMOS
  tblEstadias = $("#tblEstadias").DataTable({
    ajax: {
      url: base_url + "Estadias/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "matricula",
      },
      {
        data: "titulo",
      },
      {
        data: "codigo",
      },
      {
        data: "estante",
      },
      {
        data: "color",
      },
      {
        data: "carrera",
      },
      {
        data: "generacion",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para copiar
      {
        extend: "copyHtml5",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tblDocumentos = $("#tblDocumentos").DataTable({
    ajax: {
      url: base_url + "Documentos/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "color_estante",
      },
      {
        data: "id_generacion",
      },
      {
        data: "matricula",
      },
      {
        data: "apellido_p",
      },
      {
        data: "apellido_m",
      },
      {
        data: "nombre",
      },
      {
        data: "id_carrera",
      },
      {
        data: "codigo_estadia",
      },
      {
        data: "nombre_proyecto",
      },
      {
          data: "fecha_documento",
        },
        {
          data: "nombre_empresa",
        },
        {
          data: "tutor_academico",
        },
        {
          data: "asesor_academico",
        },
        {
          data: "asesor_empresarial",
        },
        {
          data: "observaciones",
        },
        {
        data: "estado",
        },
        {
        data: "acciones",
        },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para copiar
      {
        extend: "copyHtml5",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tbllibro = $("#tbllibro").DataTable({
    ajax: {
      url: base_url + "Libros/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "codigo_estadia",
      },
      {
        data: null,
        render: function (data, type, row) {
          return row.inicio + ' ' + row.generacion;
        }
      },
      {
        data: "matricula",
      },
      {
        data: "apellido_p",
      },
      {
        data: "apellido_m",
      },
      {
        data: "nombre",
      },
      {
        data: "nombre_carrera",
      },
      {
        data: "color_estante",
      },
      {
        data: "nombre_proyecto",
      },
      {
          data: "fecha_documento",
        },
        {
          data: "nombre_empresa",
        },
        {
          data: "tutor_academico",
        },
        {
          data: "asesor_academico",
        },
        {
          data: "asesor_empresarial",
        },
        {
          data: "observaciones",
        },
        {
        data: "imagen",
        },
        {
        data: "estado",
        },
        {
        data: "acciones",
        },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success"style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para copiar
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success" style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tblBALLEZA = $("#tblBALLEZA").DataTable({
    ajax: {
      url: base_url + "EstadiasB/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "codigo_estadia",
      },
      {
        data: "id_generacion",
      },
      {
        data: "matricula",
      },
      {
        data: "apellido_p",
      },
      {
        data: "apellido_m",
      },
      {
        data: "nombre",
      },
      {
        data: "id_carrera",
      },
      {
        data: "color_estante",
      },
      {
        data: "nombre_proyecto",
      },
      {
          data: "fecha_documento",
        },
        {
          data: "nombre_empresa",
        },
        {
          data: "tutor_academico",
        },
        {
          data: "asesor_academico",
        },
        {
          data: "asesor_empresarial",
        },
        {
          data: "observaciones",
        },
        {
        data: "estado",
        },
        {
        data: "acciones",
        },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.4em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
       //Botón para print
       {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info"style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tblAutores = $("#tblAutores").DataTable({
    ajax: {
      url: base_url + "Autores/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.5em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tblESTUDIANTES = $("#tblESTUDIANTES").DataTable({
    ajax: {
      url: base_url + "Estudiantes/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "matricula",
      },
      {
        data: "nombre_carrera",
      },
      {
        data: "telefono",
      },
      {
        data: "correo",
      },
      {
        data: "direccion",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.5em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tblEditoriales = $("#tblEditoriales").DataTable({
    ajax: {
      url: base_url + "Editoriales/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.5em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tblLIBROB = $("#tblLIBROB").DataTable({
    ajax: {
      url: base_url + "Libros_biblioteca/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "biblioteca",
      },
      {
        data: "clasificacion",
      },
      {
        data: "codigo",
      },
      {
        data: "cantidadejemplar",
      },
      {
        data: "cantidad",
      },
      {
        data: "titulo",
      },
      {
        data: "nombre_autor",
      },
      {
        data: "nombre_editorial",
      },
      {
        data: "observaciones",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.5em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
  tbl_prestamoslibros = $("#tbl_prestamoslibros").DataTable({
    ajax: {
      url: base_url + "Prestamoslibros/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "titulo",
      },
      {
        data: "nombre_estudiante",
      },
      {
        data: "cantidad",
      },
      {
        data: "fecha_prestamo",
      },
      {
        data: "fecha_devolucion",
      },
      {
        data: "horap",
      },
      {
        data: "observacionesp",
      },
      {
        data: "observaciones_devoluciones",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    dom:
      "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      {
        //Botón para Excel
        extend: "excelHtml5",
        footer: true,
        title: "Archivo",
        filename: "Export_File",

        //Aquí es donde generas el botón personalizado
        text: '<span class="badge badge-success" style="font-size: 1.5em;"><i class="fas fa-file-excel"></i></span>',
      },
      //Botón para PDF
      {
        extend: "pdfHtml5",
        download: "open",
        footer: true,
        title: "Reporte de usuarios",
        filename: "Reporte de usuarios",
        text: '<span class="badge  badge-danger"style="font-size: 1.4em;"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: {
          columns: [0, ":visible"],
        },
      },
      //Botón para print
      {
        extend: "print",
        footer: true,
        filename: "Export_File_print",
        text: '<span class="badge badge-light"style="font-size: 1.4em;"><i class="fas fa-print"></i></span>',
      },
      //Botón para cvs
      {
        extend: "csvHtml5",
        footer: true,
        filename: "Export_File_csv",
        text: '<span class="badge  badge-success"style="font-size: 1.4em;"><i class="fas fa-file-csv"></i></span>',
      },
      {
        extend: "colvis",
        text: '<span class="badge  badge-info" style="font-size: 1.4em;"><i class="fas fa-columns"></i></span>',
        postfixButtons: ["colvisRestore"],
      },
    ],
  });
});
function frmCambiarPass(e) {
  e.preventDefault();
  const actual = document.getElementById("clave_actual").value;
  const nueva = document.getElementById("clave_nueva").value;
  const confirmar = document.getElementById("confirmar_clave").value;
  if (actual == "" || nueva == "" || confirmar == "") {
    alertas("todos los campos son obligatorios", "warning");
  } else {
    if (nueva != confirmar) {
      alertas("Las contraseñas no coinciden", "warning");
      return false;
    } else {
      const url = base_url + "Usuarios/CambiarPass";
      const frm = document.getElementById("frmCambiarPass");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          $("#cambiarpass").modal("hide");
          alertas(res.msg, res.icono);
          frm.reset();
        }
      };
    }
  }
}
function frmUsuario() {
  document.getElementById("title").innerHTML = "Nuevo Usuario";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("claves").classList.remove("d-none");
  document.getElementById("frmUsuario").reset();
  $("#nuevo_usuario").modal("show");
  document.getElementById("id").value = "";
}
function registrarUser(e) {
  e.preventDefault();
  const usuario = document.getElementById("usuario");
  const nombre = document.getElementById("nombre");
  const clave = document.getElementById("clave");
  const confirmar = document.getElementById("confirmar");
  const caja = document.getElementById("caja");
  if (usuario.value == "" || nombre.value == "" || caja.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Usuarios/registrar";
    const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Usuario registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Usuario Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarUser(id) {
  document.getElementById("title").innerHTML = "Actualizar Usuario";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Usuarios/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("usuario").value = res.usuario;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("caja").value = res.id_caja;
      document.getElementById("claves").classList.add("d-none");
      $("#nuevo_usuario").modal("show");
    }
  };
}
function btnEliminarUser(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El usuario no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Usuario eliminado con exito", "success");
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarUser(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Usuario reingresado con exito", "success");
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN USUARIOS
function frmCarreraa() {
  document.getElementById("title").innerHTML = "Nueva Carrera";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmCarreraa").reset();
  $("#nuevo_carreraa").modal("show");
  document.getElementById("id").value = "";
}
function registrarCarr(e) {
  e.preventDefault();
  const nombre = document.getElementById("nombre");
  const abreviatura = document.getElementById("abreviatura");
  if (nombre.value == "" || abreviatura.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Carrerass/registrar";
    const frm = document.getElementById("frmCarreraa");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Carrera registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_carreraa").modal("hide");
          tblCarrerass.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Carrera Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_carreraa").modal("hide");
          tblCarrerass.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarcarr(id) {
  document.getElementById("title").innerHTML = "Actualizar Carrera";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Carrerass/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("abreviatura").value = res.abreviatura;
      $("#nuevo_carreraa").modal("show");
    }
  };
}
function btnEliminarcarr(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "La carrera no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Carrerass/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Carrera eliminada con exito", "success");
            tblCarrerass.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarcarr(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Carrerass/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Carrera reingresado con exito", "success");
            tblCarrerass.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN CARRERAS
function frmLector() {
  document.getElementById("title").innerHTML = "Nuevo Lector";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmLector").reset();
  $("#nuevo_Lector").modal("show");
  document.getElementById("id").value = "";
}
function registrarLec(e) {
  e.preventDefault();
  const dni = document.getElementById("dni");
  const nombre = document.getElementById("nombre");
  const telefono = document.getElementById("telefono");
  const direccion = document.getElementById("direccion");
  if (
    dni.value == "" ||
    nombre.value == "" ||
    telefono.value == "" ||
    direccion.value == ""
  ) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Lectores/registrar";
    const frm = document.getElementById("frmLector");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Lector registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_Lector").modal("hide");
          tblLectores.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Lector Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_Lector").modal("hide");
          tblLectores.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarLE(id) {
  document.getElementById("title").innerHTML = "Actualizar Lector";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Lectores/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("dni").value = res.dni;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("telefono").value = res.telefono;
      document.getElementById("direccion").value = res.direccion;
      $("#nuevo_Lector").modal("show");
    }
  };
}
function btnEliminarLE(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El Lector no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Lectores/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Lector eliminado con exito", "success");
            tblLectores.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarLE(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Lectores/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Lector reingresado con exito", "success");
            tblLectores.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN LECTORES
function frmGeneracion() {
  document.getElementById("title").innerHTML = "Nueva Generacion";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmGeneracion").reset();
  $("#nuevo_generacion").modal("show");
  document.getElementById("id").value = "";
}
function registrarGENE(e) {
  e.preventDefault();
  const inicio = document.getElementById("inicio");
  const final = document.getElementById("final");
  if (inicio.value == "" || final.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Generaciones/registrar";
    const frm = document.getElementById("frmGeneracion");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Generacion registrada con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_generacion").modal("hide");
          tblGeneraciones.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Generacion Modificada con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_generacion").modal("hide");
          tblGeneraciones.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarGENE(id) {
  document.getElementById("title").innerHTML = "Actualizar Generacion";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Generaciones/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("inicio").value = res.inicio;
      document.getElementById("final").value = res.final;
      $("#nuevo_generacion").modal("show");
    }
  };
}
function btnEliminarGENE(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "La generacion no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Generaciones/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Generacion eliminada con exito", "success");
            tblGeneraciones.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarGENE(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Generaciones/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire(
              "Mensaje!",
              "Generacion reingresada con exito",
              "success"
            );
            tblGeneraciones.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN GENERACION
function frmRol() {
  document.getElementById("title").innerHTML = "Nuevo Rol";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmRol").reset();
  $("#nuevo_rol").modal("show");
  document.getElementById("id").value = "";
}
function registrarRol(e) {
  e.preventDefault();
  const caja = document.getElementById("caja");
  if (caja.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Roles/registrar";
    const frm = document.getElementById("frmRol");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Rol registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_rol").modal("hide");
          tblRoles.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Rol Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_rol").modal("hide");
          tblRoles.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarROL(id) {
  document.getElementById("title").innerHTML = "Actualizar Rol";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Roles/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("caja").value = res.caja;
      $("#nuevo_rol").modal("show");
    }
  };
}
function btnEliminarROL(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El Rol no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Roles/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Rol eliminado con exito", "success");
            tblRoles.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarROL(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Roles/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", " Rol reingresado con exito", "success");
            tblRoles.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN ROLES
function frmPrestamos() {
  document.getElementById("title").innerHTML = "Nuevo Prestamo";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmPrestamos").reset();
  $("#nuevo_prestamos").modal("show");
  document.getElementById("id").value = "";
}
function registrarPRESTAMO(e) {
  e.preventDefault();
  const id_lector = document.getElementById("id_lector");
  const fecha_prestamo = document.getElementById("fecha_prestamo");
  const fecha_devolucion = document.getElementById("fecha_devolucion");
  if (
    id_lector.value == "" ||
    fecha_prestamo.value == "" ||
    fecha_devolucion.value == ""
  ) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Prestamos/registrar";
    const frm = document.getElementById("frmPrestamos");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Prestamo registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_prestamos").modal("hide");
          tblPrestamos.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Prestamo Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_prestamos").modal("hide");
          tblPrestamos.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarPresta(id) {
  document.getElementById("title").innerHTML = "Actualizar Prestamo";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Prestamos/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("id_lector").value = res.id_lector;
      document.getElementById("fecha_prestamo").value = res.fecha_prestamo;
      document.getElementById("fecha_devolucion").value = res.fecha_devolucion;
      $("#nuevo_prestamos").modal("show");
    }
  };
}
function btnEliminarPresta(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El Prestamo no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Prestamos/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Prestamo eliminado con exito", "success");
            tblPrestamos.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarPresta(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Prestamos/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Prestamo reingresado con exito", "success");
            tblPrestamos.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN PRESTAMOS 
async function obtenerUltimoCodigo() {
  const url = base_url + "Libros/obtenerUltimoCodigo";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();

  return new Promise((resolve, reject) => {
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        resolve(res.ultimoCodigo);
      }
    };
  });
}
async function generarFolio() {
  try {
    const ultimoCodigo = await obtenerUltimoCodigo();
    const nuevoCodigo = parseInt(ultimoCodigo) + 1;
    const folio = String(nuevoCodigo).padStart(8, '0');
    // Asignar el nuevo código al campo correspondiente
    document.getElementById("codigo_estadia").value = folio;
    document.getElementById("folioValue").innerText = folio;
  } catch (error) {
    console.error("Error al obtener el último código de estadia:", error);
  }
}
function frmlibro() {
  document.getElementById("title").innerHTML = "Nueva Estadia";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmlibro").reset();
  $("#nuevo_libro").modal("show");
  document.getElementById("id").value = "";
  generarFolio();
}
function registrarlibro(e) {
  e.preventDefault();
  const color_estante = document.getElementById("color_estante");
  const id_generacion = document.getElementById("id_generacion");
  const matricula = document.getElementById("matricula");
  const apellido_p = document.getElementById("apellido_p");
  const apellido_m = document.getElementById("apellido_m");
  const nombre = document.getElementById("nombre");
  const id_carrera = document.getElementById("id_carrera");
  const codigo_estadia = document.getElementById("codigo_estadia");
  const nombre_proyecto = document.getElementById("nombre_proyecto");
  const fecha_documento = document.getElementById("fecha_documento");
  const nombre_empresa = document.getElementById("nombre_empresa");
  const tutor_academico = document.getElementById("tutor_academico");
  const asesor_academico = document.getElementById("asesor_academico");
  const asesor_empresarial = document.getElementById("asesor_empresarial");
  const observaciones = document.getElementById("observaciones");
  
  if (color_estante.value == "" || id_generacion.value == "" || matricula.value == "" || apellido_p.value == "" || apellido_m.value == "" || nombre.value == "" || id_carrera.value == "" || codigo_estadia.value == "" || nombre_proyecto.value == "" || fecha_documento.value == "" || nombre_empresa.value == "" || tutor_academico.value == "" || asesor_academico.value == "" || asesor_empresarial.value == "" || observaciones.value == "") {
      Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Todos los campos son obligatorios",
          showConfirmButton: false,
          timer: 3000,
      });
  } else {
      const url = base_url + "Libros/registrar";
      const frm = document.getElementById("frmlibro");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
              if (res == "si") {
                  Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Estadia registrada con exito",
                      showConfirmButton: false,
                      timer: 3000,
                  });
                  frm.reset();
                  $("#nuevo_libro").modal("hide");
                  tbllibro.ajax.reload();
              } else if (res == "Modificado") {
                  Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Estadia Modificada con exito",
                      showConfirmButton: false,
                      timer: 3000,
                  });
                  $("#nuevo_libro").modal("hide");
                  tbllibro.ajax.reload();
              } else {
                  Swal.fire({
                      position: "top-end",
                      icon: "error",
                      title: res,
                      showConfirmButton: false,
                      timer: 3000,
                  });
              }
          }
      };
  }
}
function btnEditarlibro(id) {
  document.getElementById("title").innerHTML = "Actualizar Estadia";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Libros/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          document.getElementById("id").value = res.id;
          document.getElementById("color_estante").value = res.color_estante;
          document.getElementById("id_generacion").value = res.id_generacion;
          document.getElementById("matricula").value = res.matricula;
          document.getElementById("apellido_p").value = res.apellido_p;
          document.getElementById("apellido_m").value = res.apellido_m;
          document.getElementById("nombre").value = res.nombre;
          document.getElementById("id_carrera").value = res.id_carrera;
          document.getElementById("codigo_estadia").value = res.codigo_estadia;
          document.getElementById("nombre_proyecto").value = res.nombre_proyecto;
          document.getElementById("fecha_documento").value = res.fecha_documento;
          document.getElementById("nombre_empresa").value = res.nombre_empresa;
          document.getElementById("tutor_academico").value = res.tutor_academico;
          document.getElementById("asesor_academico").value = res.asesor_academico;
          document.getElementById("asesor_empresarial").value = res.asesor_empresarial;
          document.getElementById("pdf-preview").src = base_url + 'Assets/img/'+ res.foto;
          $("#nuevo_libro").modal("show");
      }
  };
}
function btnEliminarlibro(id) {
  Swal.fire({
      title: "Estas Seguro de Eliminar?",
      text: "La Estadia no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si!",
      cancelButtonText: "No",
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Libros/eliminar/" + id;
          const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if (res == "ok") {
                      Swal.fire("Mensaje!", "Estadia eliminada con exito", "success");
                      tbllibro.ajax.reload();
                  } else {
                      Swal.fire("Mensaje!", res, "error");
                  }
              }
          };
      }
  });
}
function btnReingresarlibro(id) {
  Swal.fire({
      title: "Estas Seguro de reingresar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si!",
      cancelButtonText: "No",
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Libros/reingresar/" + id;
          const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if (res == "ok") {
                      Swal.fire("Mensaje!", "Estadia reingresado con exito", "success");
                      tbllibro.ajax.reload();
                  } else {
                      Swal.fire("Mensaje!", res, "error");
                  }
              }
          };
      }
  });
}
function preview(e) {
  const url = e.target.files[0];
  const urlTmp = URL.createObjectURL(url);
  document.getElementById("pdf-preview").src = urlTmp;
  document.getElementById("icon-image").classList.add("d-none");
  document.getElementById("icono-cerrar").innerHTML = `
  <button class="btn btn-danger" onclick="deletepdf(event)"><i class="fas fa-times"></i></button>
  ${url['name']}`;

}
function deletepdf(e) {
  document.getElementById("icono-cerrar").innerHTML = '';
  document.getElementById("icon-image").classList.remove("d-none");
  document.getElementById("pdf-preview").src = '';
 
}
//FIN ESTADIAS UTP 
async function obtenerUltimoCodigoestadia() {
  const url = base_url + "EstadiasB/obtenerUltimoCodigoestadia";

  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Error al obtener el último código de estadia. Estado: ${response.status}`);
    }

    const data = await response.json();
    return data.ultimoCodigo;
  } catch (error) {
    console.error("Error en la solicitud:", error.message);
    throw new Error(`Error en la solicitud: ${error.message}`);
  }
}
async function generarFolioestadia() {
  try {
    const ultimoCodigo = await obtenerUltimoCodigoestadia();
    const nuevoCodigo = parseInt(ultimoCodigo) + 1;
    const folio = String(nuevoCodigo).padStart(8, '0');

    // Asignar el nuevo código al campo correspondiente
    document.getElementById("codigo_estadia").value = folio;
    document.getElementById("folioValue").innerText = folio;
  } catch (error) {
  }
}
function frmEB() {
  document.getElementById("title").innerHTML = "Nueva Estadia";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmEB").reset();
  $("#nuevo_EstadiaB").modal("show");
  document.getElementById("id").value = "";
  generarFolioestadia();
}
function registrarEB(e) {
  e.preventDefault();
  const color_estante = document.getElementById("color_estante");
  const id_generacion = document.getElementById("id_generacion");
  const matricula = document.getElementById("matricula");
  const apellido_p = document.getElementById("apellido_p");
  const apellido_m = document.getElementById("apellido_m");
  const nombre = document.getElementById("nombre");
  const id_carrera = document.getElementById("id_carrera");
  const codigo_estadia = document.getElementById("codigo_estadia");
  const nombre_proyecto = document.getElementById("nombre_proyecto");
  const fecha_documento = document.getElementById("fecha_documento");
  const nombre_empresa = document.getElementById("nombre_empresa");
  const tutor_academico = document.getElementById("tutor_academico");
  const asesor_academico = document.getElementById("asesor_academico");
  const asesor_empresarial = document.getElementById("asesor_empresarial");
  const observaciones = document.getElementById("observaciones");
  
  if (color_estante.value == "" || id_generacion.value == "" || matricula.value == "" || apellido_p.value == "" || apellido_m.value == "" || nombre.value == "" || id_carrera.value == "" || codigo_estadia.value == "" || nombre_proyecto.value == "" || fecha_documento.value == "" || nombre_empresa.value == "" || tutor_academico.value == "" || asesor_academico.value == "" || asesor_empresarial.value == "" || observaciones.value == "") {
      Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Todos los campos son obligatorios",
          showConfirmButton: false,
          timer: 3000,
      });
  } else {
      const url = base_url + "EstadiasB/registrar";
      const frm = document.getElementById("frmEB");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
              if (res == "si") {
                  Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Estadia registrada con exito",
                      showConfirmButton: false,
                      timer: 3000,
                  });
                  frm.reset();
                  $("#nuevo_EstadiaB").modal("hide");
                  tblBALLEZA.ajax.reload();
              } else if (res == "Modificado") {
                  Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Estadia Modificada con exito",
                      showConfirmButton: false,
                      timer: 3000,
                  });
                  $("#nuevo_EstadiaB").modal("hide");
                  tblBALLEZA.ajax.reload();
              } else {
                  Swal.fire({
                      position: "top-end",
                      icon: "error",
                      title: res,
                      showConfirmButton: false,
                      timer: 3000,
                  });
              }
          }
      };
  }
}
function btnEditarEB(id) {
  document.getElementById("title").innerHTML = "Actualizar Estadia";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "EstadiasB/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          document.getElementById("id").value = res.id;
          document.getElementById("color_estante").value = res.color_estante;
          document.getElementById("id_generacion").value = res.id_generacion;
          document.getElementById("matricula").value = res.matricula;
          document.getElementById("apellido_p").value = res.apellido_p;
          document.getElementById("apellido_m").value = res.apellido_m;
          document.getElementById("nombre").value = res.nombre;
          document.getElementById("id_carrera").value = res.id_carrera;
          document.getElementById("codigo_estadia").value = res.codigo_estadia;
          document.getElementById("nombre_proyecto").value = res.nombre_proyecto;
          document.getElementById("fecha_documento").value = res.fecha_documento;
          document.getElementById("nombre_empresa").value = res.nombre_empresa;
          document.getElementById("tutor_academico").value = res.tutor_academico;
          document.getElementById("asesor_academico").value = res.asesor_academico;
          document.getElementById("asesor_empresarial").value = res.asesor_empresarial;
          document.getElementById("observaciones").value = res.observaciones;
          $("#nuevo_EstadiaB").modal("show");
      }
  };
}
function btnEliminarEB(id) {
  Swal.fire({
      title: "Estas Seguro de Eliminar?",
      text: "La Estadia no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si!",
      cancelButtonText: "No",
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "EstadiasB/eliminar/" + id;
          const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if (res == "ok") {
                      Swal.fire("Mensaje!", "Estadia eliminada con exito", "success");
                      tblBALLEZA.ajax.reload();
                  } else {
                      Swal.fire("Mensaje!", res, "error");
                  }
              }
          };
      }
  });
}
function btnReingresarEB(id) {
  Swal.fire({
      title: "Estas Seguro de reingresar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si!",
      cancelButtonText: "No",
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "EstadiasB/reingresar/" + id;
          const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if (res == "ok") {
                      Swal.fire("Mensaje!", "Estadia reingresado con exito", "success");
                      tblBALLEZA.ajax.reload();
                  } else {
                      Swal.fire("Mensaje!", res, "error");
                  }
              }
          };
      }
  });
}
//FIN CRUD BALLEZA 
function Modificarempresa() {
  const frm = document.getElementById("frmEmpresa");
  const url = base_url + "Administracion/modificar";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res == "ok") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Datos Actualizados Correctamente",
          showConfirmButton: false,
          timer: 3000,
        });
      }
    }
  };
}
function alertas(mensaje, icono) {
  Swal.fire({
    position: "top-end",
    icon: icono,
    title: mensaje,
    showConfirmButton: false,
    timer: 3000,
  });
}
function registrarpermisos(e) {
  e.preventDefault();
  const url = base_url + "Usuarios/registrarpermiso";
  const frm = document.getElementById("formulario");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res != "") {
        alertas(res.msg, res.icono);
      } else {
        alertas("error no identificado", "error");
      }
    }
  };
}

//FIN SISTEMA INTEGRAL PARA EL CONTROL DE ESTADIAS 
function frmAutores() {
  document.getElementById("title").innerHTML = "Nuevo Autor";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmAutores").reset();
  $("#nuevo_autor").modal("show");
  document.getElementById("id").value = "";
}
function registrarautor(e) {
  e.preventDefault();
  const nombre = document.getElementById("nombre");
  if (nombre.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Campo obligatorio",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Autores/registrar";
    const frm = document.getElementById("frmAutores");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Autor registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_autor").modal("hide");
         tblAutores.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Autor Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_autor").modal("hide");
          tblAutores.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarAutor(id) {
  document.getElementById("title").innerHTML = "Actualizar Autor";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Autores/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre").value = res.nombre;
      $("#nuevo_autor").modal("show");
    }
  };
}
function btnEliminarAutor(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El autor no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Autores/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Autor eliminado con exito", "success");
            tblAutores.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarAutor(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Autores/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Autor reingresado con exito", "success");
            tblAutores.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN AUTORES
function frmEstudiantes() {
  document.getElementById("title").innerHTML = "Nuevo Estudiante";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmEstudiantes").reset();
  $("#nuevo_estudiante").modal("show");
  document.getElementById("id").value = "";
}
function registrarEstudiante(e) {
  e.preventDefault();
  const nombre = document.getElementById("nombre");
  const matricula = document.getElementById("matricula");
  const carrera = document.getElementById("carrera");
  const correo = document.getElementById("correo");
  const telefono = document.getElementById("telefono");
  const direccion = document.getElementById("direccion");
  if (
    nombre.value == "" ||
    matricula.value == "" ||
    carrera.value == "" ||
    correo.value == "" ||
    telefono.value == ""||
    direccion.value == "" 
  ) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Estudiantes/registrar";
    const frm = document.getElementById("frmEstudiantes");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Estudiante registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_estudiante").modal("hide");
          tblESTUDIANTES.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "estudiante Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_estudiante").modal("hide");
          tblESTUDIANTES.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarESTUDIANTE(id) {
  document.getElementById("title").innerHTML = "Actualizar Datos del Estudiante";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Estudiantes/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("matricula").value = res.matricula;
      document.getElementById("carrera").value = res.carrera;
      document.getElementById("correo").value = res.correo;
      document.getElementById("telefono").value = res.telefono;
      document.getElementById("direccion").value = res.direccion;
      $("#nuevo_estudiante").modal("show");
    }
  };
}
function btnEliminarESTUDIANTE(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El Estudiante no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Estudiantes/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Estudinate eliminado con exito", "success");
            tblESTUDIANTES.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarESTUDIANTE(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Estudiantes/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Estudiante reingresado con exito", "success");
            tblESTUDIANTES.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//fin crud de estudiantes
function frmEditoriales() {
  document.getElementById("title").innerHTML = "Nuevo Editorial";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmEditoriales").reset();
  $("#nuevo_editorial").modal("show");
  document.getElementById("id").value = "";
}
function registrareditorial(e) {
  e.preventDefault();
  const nombre = document.getElementById("nombre");
  if (nombre.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Campo obligatorio",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Editoriales/registrar";
    const frm = document.getElementById("frmEditoriales");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Editorial registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_editorial").modal("hide");
          tblEditoriales.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Editorial Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_editorial").modal("hide");
          tblEditoriales.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarEditorial(id) {
  document.getElementById("title").innerHTML = "Actualizar Nombre Editorial";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Editoriales/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre").value = res.nombre;
      $("#nuevo_editorial").modal("show");
    }
  };
}
function btnEliminarEditorial(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El editorial no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Editoriales/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "editorial eliminado con exito", "success");
            tblEditoriales.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarEditorial(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Editoriales/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "editorial reingresado con exito", "success");
            tblEditoriales.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
//FIN EDITORIALES
function frmlibrosb() {
  document.getElementById("title").innerHTML = "Registro de un Nuevo libro";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmlibrosb").reset();
  $("#nuevo_librob").modal("show");
  document.getElementById("id").value = "";
}
function registrarLIBROB(e) {
  e.preventDefault();
  const biblioteca = document.getElementById("biblioteca");
  const clasificacion = document.getElementById("clasificacion");
  const codigo = document.getElementById("codigo");
  const cantidadejemplar = document.getElementById("cantidadejemplar");
  const cantidad = document.getElementById("cantidad");
  const titulo = document.getElementById("titulo");
  const autor = document.getElementById("autor");
  const editorial = document.getElementById("editorial");
  const observaciones = document.getElementById("observaciones");
  if ( biblioteca.value == "" || clasificacion.value == "" || codigo.value == "" || cantidadejemplar.value == "" || cantidad.value == "" ||titulo.value == "" || autor.value == "" ||editorial.value == "" || observaciones.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Revisa que no falte ningun Campo",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Libros_biblioteca/registrar";
    const frm = document.getElementById("frmlibrosb");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Libro registrado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_librob").modal("hide");
         tblLIBROB.ajax.reload();
        } else if (res == "Modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Libro Modificado con exito",
            showConfirmButton: false,
            timer: 3000,
          });
          $("#nuevo_librob").modal("hide");
          tblLIBROB.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEditarLIBROB(id) {
  document.getElementById("title").innerHTML = "Modificar datos del libro";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Libros_biblioteca/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("biblioteca").value = res.biblioteca;
      document.getElementById("clasificacion").value = res.clasificacion;
      document.getElementById("codigo").value = res.codigo;
      document.getElementById("cantidadejemplar").value = res.cantidadejemplar;
      document.getElementById("cantidad").value = res.cantidad;
      document.getElementById("titulo").value = res.titulo;
      document.getElementById("autor").value = res.autor;
      document.getElementById("editorial").value = res.editorial;
      document.getElementById("observaciones").value = res.observaciones;
      $("#nuevo_librob").modal("show");
    }
  };
}
function btnEliminarLIBROB(id) {
  Swal.fire({
    title: "Estas Seguro de Eliminar?",
    text: "El libro no se eliminara de forma permanente,solo cambiara el estado a inactivo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Libros_biblioteca/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "Libro eliminado con exito", "success");
            tblLIBROB.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnReingresarLIBROB(id) {
  Swal.fire({
    title: "Estas Seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "si!",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Libros_biblioteca/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res == "ok") {
            Swal.fire("Mensaje!", "libro reingresado con exito", "success");
            tblLIBROB.ajax.reload();
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
        }
      };
    }
  });
}
function btnGenerarQR(id) {
  Swal.fire({
    title: '¿Estás seguro de generar el código QR?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, generar QR',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Libros_biblioteca/generarQR/" + id;
      fetch(url)
        .then(response => response.blob())
        .then(blob => {
          const iconoBiblioteca = '<img src="https://chihuahua.gob.mx/sites/default/atach2/OIC/logos/2022-02/OIC-33.png" alt="Icono de biblioteca" style="max-width: 100px; height: auto;">';
          Swal.fire({
            title: 'Código QR generado',
            html: '<img src="' + URL.createObjectURL(blob) + '" alt="Código QR" style="max-width: 100%; height: auto;">' + 
                  '<br>' + iconoBiblioteca +
                  '<br><button class="btn btn-success" id="downloadQR">Descargar QR</button>',
            icon: 'success'
          });

          document.getElementById('downloadQR').addEventListener('click', () => {
            descargarQR(blob);
          });
        })
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al generar el código QR',
            icon: 'error'
          });
        });
    }
  });
}
function descargarQR(svg) {
  const canvas = document.createElement('canvas');
  const context = canvas.getContext('2d');
  const img = new Image();
  
  img.onload = function() {
    canvas.width = img.width;
    canvas.height = img.height;
    context.drawImage(img, 0, 0);
    const link = document.createElement('a');
    link.download = 'codigo_qr.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
  };
  const blob = new Blob([svg], { type: 'image/svg+xml' });
  const url = URL.createObjectURL(blob);
  img.src = url;
}
//fin libros de la biblioteca 
function insertarregistros(url, tabla, selector, timeout) {
  const formData = new FormData(document.querySelector(selector));
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res.estado === "success") {
        Swal.fire({
          icon: "success",
          title: "Devolución registrada",
          showConfirmButton: false,
          timer: 3000,
        });
        tabla.ajax.reload();
      } else {
        Swal.fire({
          icon: "error",
          title: "Error al registrar la devolución",
          showConfirmButton: false,
          timer: 3000,
        });
      }
      if (res.id) {
        setTimeout(() => {
          window.open(base_url + 'Prestamoslibros/generarticked/' + res.id);
        }, 2000);
      }
      
    }
  };
  http.send(formData);
}
function frmprestamodelibros() {
  document.getElementById("title").innerHTML = "Registro de un Nuevo libro";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmprestamodelibros").reset();
  $("#nuevo_prestamodelibro").modal("show");
  document.getElementById("id").value = "";
}
function registrarprestamodelibro(e) {
  e.preventDefault();
  const buscarLibro = document.getElementById("buscar_libro");
  const autor = document.getElementById("autor");
  const editorial = document.getElementById("editorial");
  const buscarEstudiante = document.getElementById("buscar_estudiante");
  const cantidad = document.getElementById("cantidad");
  const fechaPrestamo = document.getElementById("fecha_prestamo");
  const fechaDevolucion = document.getElementById("fecha_devolucion");
  const horaPrestamo = document.getElementById("horap");
  const observacionesp = document.getElementById("observacionesp");
  
  if (buscarLibro.value === "" || autor.value === ""|| editorial.value === ""|| buscarEstudiante.value === "" || cantidad.value === "" || fechaPrestamo.value === "" || fechaDevolucion.value === "" || horaPrestamo.value === "" || observacionesp.value === "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Revisa que no falte ningún campo",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Prestamoslibros/registrar";
    const frm = document.getElementById("frmprestamodelibros");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res.estado === "success") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: res.mensaje,
            showConfirmButton: false,
            timer: 3000,
          });
          frm.reset();
          $("#nuevo_prestamodelibro").modal("hide");
          tbl_prestamoslibros.ajax.reload();
          if (res.id) {
            setTimeout(() => {
              Swal.fire({
                title: "Enviar Correo al Estudinate",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si Enviar!",
                cancelButtonText: "Cancelar",
              }).then((result) => {
                if (result.isConfirmed) {
                  enviarcorreo(res.id);
                }
              });
              window.open(base_url + 'Prestamoslibros/generarticked/' + res.id);
            }, 2000);
          }
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}
function btnEntregar(id) {
  document.querySelector("#id_prestamoo").value = id;
  $("#devolucion_prestamo").modal("show");
    
}
function registrardevolucion(e) {
  e.preventDefault();
  const url = base_url + "Prestamoslibros/devolucion/";
  const frm = document.getElementById("frmdevolucion");
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res.msg === "Libro recibido") {
        $('#devolucion_prestamo').modal('hide');
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Libro devuelto correctamente",
          showConfirmButton: false,
          timer: 3000
        });
        $("#devolucion_prestamo").modal("hide");
        tbl_prestamoslibros.ajax.reload();
      } else {
        document.getElementById("mensaje-devolucion").innerHTML = "<p>Error al devolver el libro: " + res.msg + "</p>";
      }
    }
  };
}
function enviarCorreo(id) {
  Swal.fire({
      title: '¿Estás seguro de enviar el correo?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, enviar correo',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Prestamoslibros/enviarCorreo/" + id;
          fetch(url)
              .then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      Swal.fire({
                          title: 'Correo Enviado',
                          icon: 'success'
                      });
                  } else {
                      Swal.fire({
                          title: 'Error',
                          text: data.message,
                          icon: 'error'
                      });
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  Swal.fire({
                      title: 'Error',
                      text: 'Hubo un problema al enviar el correo',
                      icon: 'error'
                  });
              });
      }
  });
}

function iniciarEscaneoQR() {
  const video = document.getElementById('video');

  navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
      .then((stream) => {
          video.srcObject = stream;
          video.play();
          escanearQR();
      })
      .catch((err) => console.error('Error accediendo a la cámara:', err));
}

function escanearQR() {
  const video = document.getElementById('video');
  const canvasElement = document.createElement('canvas');
  const context = canvasElement.getContext('2d');

  // Esperar a que el video esté listo
  video.onloadedmetadata = function() {
      canvasElement.width = video.videoWidth;
      canvasElement.height = video.videoHeight;
      context.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
      const imageData = context.getImageData(0, 0, canvasElement.width, canvasElement.height);
      const code = jsQR(imageData.data, imageData.width, imageData.height);
      console.log(code)
      if (code) {
        
          alert('Código QR detectado: ' + code.data);
          buscarLibroPorQR(code)
      } else {
          requestAnimationFrame(escanearQR);
      }
  };
}

function buscarLibroPorQR(code){
  var buscarLibro = document.getElementById("buscar_libro")

  // buscarLibro.value=code
}



//FIN
// Data for the chart
var data = {
  name: 'Monthly Sales Report', // Nombre de la gráfica
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [{
      label: 'Prestamos por Mes',
      backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color de fondo
      borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
      borderWidth: 1,
      data: [10, 20, 15, 25, 30, 40, 35] // Datos de la gráfica
  }]
};
var options = {
  scales: {
      yAxes: [{
          ticks: {
              beginAtZero: true
          }
      }]
  }
};
var ctx = document.getElementById('reporte_mes').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});


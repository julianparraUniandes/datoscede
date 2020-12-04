<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Por favor revise el formulario y valide los datos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h5 class="text-center">Los campos con (*) son obligatorios</h5>
    <div class="labelsForm text-center">
        
    </div>
    <form method="POST" action="{{ route('complete.data') }}">
        @csrf
        <div class="formControls">
            <div class="btn-group registerControl">
                <select class="form-control" name="tipo" id="tipo" required>
                    <option disabled selected value="">Usted es * </option>   
                    <option value="Estudiante">Estudiante</option>
                    <option value="Profesor/Investigador">Profesor/Investigador</option>
                    <option value="Administrativo">Administrativo</option>            
                </select>
            </div>
            <div class="btn-group registerControl text-ring">
                <select class="form-control" name="facultad" id="facultad" required>
                    <option disabled selected value="">Seleccione su unidad *</option>   
                    <option value="Centro de Español">Centro de Español</option>
                    <option value="Centro de Estudios para la Orinoquía">Centro de Estudios para la Orinoquía</option>
                    <option value="Centro de Ética">Centro de Ética</option>
                    <option value="Centro de Innovación en Tecnología y Educación (Conecta-TE)">Centro de Innovación en Tecnología y Educación (Conecta-TE)</option>
                    <option value="Centro Interdisciplinario de Estudios sobre Desarrollo (Cider)">Centro Interdisciplinario de Estudios sobre Desarrollo (Cider)</option>
                    <option value="Decanatura de Estudiantes">Decanatura de Estudiantes</option>
                    <option value="Escuela de Gobierno">Escuela de Gobierno</option>
                    <option value="Facultad de Administración">Facultad de Administración</option>
                    <option value="Facultad de Arquitectura y Diseño">Facultad de Arquitectura y Diseño</option>
                    <option value="Facultad de Artes y Humanidades">Facultad de Artes y Humanidades</option>
                    <option value="Facultad de Ciencias">Facultad de Ciencias</option>
                    <option value="Facultad de Ciencias Sociales">Facultad de Ciencias Sociales</option>
                    <option value="Facultad de Derecho">Facultad de Derecho</option>
                    <option value="Facultad de Economía">Facultad de Economía</option>
                    <option value="Facultad de Educación">Facultad de Educación</option>
                    <option value="Facultad de Ingeniería">Facultad de Ingeniería</option>
                    <option value="Facultad de Medicina">Facultad de Medicina</option>
                    <option value="Ombudsperson">Ombudsperson</option>
                    <option value="Otro">Otro</option>
                    <option value="Rectoría">Rectoría</option>
                    <option value="Secretaría General">Secretaría General</option>
                    <option value="Vicerrectoría Académica">Vicerrectoría Académica</option>
                    <option value="Vicerrectoría Administrativa y Financiera">Vicerrectoría Administrativa y Financiera</option>
                    <option value="Vicerrectoría de Desarrollo y Egresados">Vicerrectoría de Desarrollo y Egresados</option>
                    <option value="Vicerrectoría de Investigación y Creación">Vicerrectoría de Investigación y Creación</option>
                    <option value="Vicerrectoría de Servicios y Sostenibilidad">Vicerrectoría de Servicios y Sostenibilidad</option>            
                </select>
            </div>            
            <div class="btn-group registerControl text-ring">
                <select class="form-control" name="programa" id="programa" required disabled>
                    <option disabled selected value="">Programa *</option>   
                    <option value="Administración">Administración</option>
                    <option value="Antropología">Antropología</option>
                    <option value="Arquitectura">Arquitectura</option>
                    <option value="Arte">Arte</option>
                    <option value="Automatización de Proc. Indust.">Automatización de Proc. Indust.</option>
                    <option value="Biología">Biología</option>
                    <option value="CIDER">CIDER</option>
                    <option value="Ciencia Política">Ciencia Política</option>
                    <option value="Ciencias Sociales">Ciencias Sociales</option>
                    <option value="Contaduría Internacional">Contaduría Internacional</option>
                    <option value="Derecho">Derecho</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Doctorado en Administración">Doctorado en Administración</option>
                    <option value="Doctorado en Antropología">Doctorado en Antropología</option>
                    <option value="Doctorado en Biología">Doctorado en Biología</option>
                    <option value="Doctorado en Ciencia Política">Doctorado en Ciencia Política</option>
                    <option value="Doctorado en Derecho">Doctorado en Derecho</option>
                    <option value="Doctorado en Economía">Doctorado en Economía</option>
                    <option value="Doctorado en Educación">Doctorado en Educación</option>
                    <option value="Doctorado en Estu. Interdisc. Sobre Drllo.">Doctorado en Estu. Interdisc. Sobre Drllo.</option>
                    <option value="Doctorado en Filosofía">Doctorado en Filosofía</option>
                    <option value="Doctorado en Física">Doctorado en Física</option>
                    <option value="Doctorado en Gest. Innovac. Tecnol.">Doctorado en Gest. Innovac. Tecnol.</option>
                    <option value="Doctorado en Historia">Doctorado en Historia</option>
                    <option value="Doctorado en Ingeniería">Doctorado en Ingeniería</option>
                    <option value="Doctorado en Literatura">Doctorado en Literatura</option>
                    <option value="Doctorado en Matemáticas">Doctorado en Matemáticas</option>
                    <option value="Doctorado en Pscicología">Doctorado en Pscicología</option>
                    <option value="Doctorado en Química">Doctorado en Química</option>
                    <option value="Economía">Economía</option>
                    <option value="Educación">Educación</option>
                    <option value="EGIE- Espec. Gest. Instituciones Educativas">EGIE- Espec. Gest. Instituciones Educativas</option>
                    <option value="Esp. Dere. Minero Energ. Des. Soste.">Esp. Dere. Minero Energ. Des. Soste.</option>
                    <option value="Espec. Administración Financiera">Espec. Administración Financiera</option>
                    <option value="Espec. Automatización de Procesos Industriales">Espec. Automatización de Procesos Industriales</option>
                    <option value="Espec. Currículo y Pedagogía">Espec. Currículo y Pedagogía</option>
                    <option value="Espec. Derec. Negoc. Internacionales">Espec. Derec. Negoc. Internacionales</option>
                    <option value="Espec. Derecho de la Empresa">Espec. Derecho de la Empresa</option>
                    <option value="Espec. Desarrollo de Videojuegos">Espec. Desarrollo de Videojuegos</option>
                    <option value="Espec. En Estado, Políticas Públicas y Drrllo.">Espec. En Estado, Políticas Públicas y Drrllo.</option>
                    <option value="Espec. Evaluación Social de Proyectos">Espec. Evaluación Social de Proyectos</option>
                    <option value="Espec. Gerencia de Abastec. Estratégico">Espec. Gerencia de Abastec. Estratégico</option>
                    <option value="Espec. Gestión de Instituciones Educativas">Espec. Gestión de Instituciones Educativas</option>
                    <option value="Espec. Gestión y Planificación Territorial">Espec. Gestión y Planificación Territorial</option>
                    <option value="Espec. Ingen. De Sistemas Hídricos Urbanos">Espec. Ingen. De Sistemas Hídricos Urbanos</option>
                    <option value="Espec. Inteligencia de Mercados">Espec. Inteligencia de Mercados</option>
                    <option value="Espec. Legislación Financiera">Espec. Legislación Financiera</option>
                    <option value="Espec. Manejo integrado del Medio Ambiente">Espec. Manejo integrado del Medio Ambiente</option>
                    <option value="Espec. Negociación">Espec. Negociación</option>
                    <option value="Espec. Organizaciones, Respon. Social y Drrllo.">Espec. Organizaciones, Respon. Social y Drrllo.</option>
                    <option value="Espec. Sistemas de Transmi. Y Distrib. De Ener. Eléc.">Espec. Sistemas de Transmi. Y Distrib. De Ener. Eléc.</option>
                    <option value="Especia. Gestión Pública">Especia. Gestión Pública</option>
                    <option value="Especialización Derecho Comercial">Especialización Derecho Comercial</option>
                    <option value="Especialización en Economía">Especialización en Economía</option>
                    <option value="Especialización en Epidemiología">Especialización en Epidemiología</option>
                    <option value="Especialización en Pediatría">Especialización en Pediatría</option>
                    <option value="Especialización en Tributación">Especialización en Tributación</option>
                    <option value="Filosofía">Filosofía</option>
                    <option value="Física">Física</option>
                    <option value="Geociencias">Geociencias</option>
                    <option value="Historia">Historia</option>
                    <option value="Historia del Arte">Historia del Arte</option>
                    <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                    <option value="Ingeniería Biomédica ">Ingeniería Biomédica </option>
                    <option value="Ingeniería Civil">Ingeniería Civil</option>
                    <option value="Ingeniería de Alimentos">Ingeniería de Alimentos</option>
                    <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                    <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
                    <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
                    <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                    <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                    <option value="Ingeniería Química">Ingeniería Química</option>
                    <option value="Lenguas y Cultura">Lenguas y Cultura</option>
                    <option value="Licenciatura en Artes">Licenciatura en Artes</option>
                    <option value="Licenciatura en Biología">Licenciatura en Biología</option>
                    <option value="Licenciatura en Educación Infantil">Licenciatura en Educación Infantil</option>
                    <option value="Licenciatura en Español y Filología">Licenciatura en Español y Filología</option>
                    <option value="Licenciatura en Filosofía">Licenciatura en Filosofía</option>
                    <option value="Licenciatura en Física">Licenciatura en Física</option>
                    <option value="Licenciatura en Historia">Licenciatura en Historia</option>
                    <option value="Licenciatura en Matemáticas">Licenciatura en Matemáticas</option>
                    <option value="Licenciatura en Química">Licenciatura en Química</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Maes. en Arquitectura de TI">Maes. en Arquitectura de TI</option>
                    <option value="Maest. Biología Computacional">Maest. Biología Computacional</option>
                    <option value="Maest. Dere. Gob. Y Gest. Justicia">Maest. Dere. Gob. Y Gest. Justicia</option>
                    <option value="Maest. Derecho Internacional">Maest. Derecho Internacional</option>
                    <option value="Maest. Diseño Proces. Y Product.">Maest. Diseño Proces. Y Product.</option>
                    <option value="Maest. Educación Matemática ">Maest. Educación Matemática </option>
                    <option value="Maest. En Der. Público Gest. Admin. ">Maest. En Der. Público Gest. Admin. </option>
                    <option value="Maest. En Estudios Culturales">Maest. En Estudios Culturales</option>
                    <option value="Maest. En Gerencia Ambiental">Maest. En Gerencia Ambiental</option>
                    <option value="Maest. En investig. En Admon.">Maest. En investig. En Admon.</option>
                    <option value="Maest. Estudios Inter. Sobre Desarrollo">Maest. Estudios Inter. Sobre Desarrollo</option>
                    <option value="Maest. Estudios Internacionales">Maest. Estudios Internacionales</option>
                    <option value="Maest. Estudios sobre Sustenibilidad">Maest. Estudios sobre Sustenibilidad</option>
                    <option value="Maest. Geren. Y Prac. Drllo.">Maest. Geren. Y Prac. Drllo.</option>
                    <option value="Maest. Gerenc. Y Prac. Drllo.">Maest. Gerenc. Y Prac. Drllo.</option>
                    <option value="Maest. Gerencia Estratégica">Maest. Gerencia Estratégica</option>
                    <option value="Maest. Gest. Estra. Proy. De Arquitectura">Maest. Gest. Estra. Proy. De Arquitectura</option>
                    <option value="Maest. Gest. Innovac. Tecnol.">Maest. Gest. Innovac. Tecnol.</option>
                    <option value="Maest. Humanidades Digitales">Maest. Humanidades Digitales</option>
                    <option value="Maest. Ingen. Electr. Y de Computadores">Maest. Ingen. Electr. Y de Computadores</option>
                    <option value="Maest. Ingenier. De información">Maest. Ingenier. De información</option>
                    <option value="Maest. Ingeniería de Petroleos">Maest. Ingeniería de Petroleos</option>
                    <option value="Maest. Ingeniería de Software">Maest. Ingeniería de Software</option>
                    <option value="Maest. Intelig. Analit. Toma Decisiones">Maest. Intelig. Analit. Toma Decisiones</option>
                    <option value="Maest. Internacional en Finanzas">Maest. Internacional en Finanzas</option>
                    <option value="Maest. Patrimonio Cultural Mueble">Maest. Patrimonio Cultural Mueble</option>
                    <option value="Maest. Piscolog. Clinica y Salud">Maest. Piscolog. Clinica y Salud</option>
                    <option value="Maest. Tecnolog. Informac. Negoc.">Maest. Tecnolog. Informac. Negoc.</option>
                    <option value="Maestr. Planifi. Urbana y Regional">Maestr. Planifi. Urbana y Regional</option>
                    <option value="Maestría en Administración">Maestría en Administración</option>
                    <option value="Maestría en Antropología">Maestría en Antropología</option>
                    <option value="Maestría en Arquitectura">Maestría en Arquitectura</option>
                    <option value="Maestría en Artes Plast. Elect. Y T.">Maestría en Artes Plast. Elect. Y T.</option>
                    <option value="Maestría en Ciencia Política">Maestría en Ciencia Política</option>
                    <option value="Maestría en Ciencias - Física">Maestría en Ciencias - Física</option>
                    <option value="Maestría en Ciencias Biológicas">Maestría en Ciencias Biológicas</option>
                    <option value="Maestría en Construcción de Paz">Maestría en Construcción de Paz</option>
                    <option value="Maestría en Derecho">Maestría en Derecho</option>
                    <option value="Maestría en Derecho Privado">Maestría en Derecho Privado</option>
                    <option value="Maestría en Diseño">Maestría en Diseño</option>
                    <option value="Maestría en Economía">Maestría en Economía</option>
                    <option value="Maestría en Economía Aplicada">Maestría en Economía Aplicada</option>
                    <option value="Maestría en Educación">Maestría en Educación</option>
                    <option value="Maestría en Epidemiología">Maestría en Epidemiología</option>
                    <option value="Maestría en Estudios Clásicos">Maestría en Estudios Clásicos</option>
                    <option value="Maestría en Filosofía">Maestría en Filosofía</option>
                    <option value="Maestría en Finanzas">Maestría en Finanzas</option>
                    <option value="Maestría en Género">Maestría en Género</option>
                    <option value="Maestría en Geografía">Maestría en Geografía</option>
                    <option value="Maestría en Gestión Pública">Maestría en Gestión Pública</option>
                    <option value="Maestría en Historia">Maestría en Historia</option>
                    <option value="Maestría en Historia del Arte">Maestría en Historia del Arte</option>
                    <option value="Maestría en Ingen. Ambiental">Maestría en Ingen. Ambiental</option>
                    <option value="Maestría en Ingen. Biomédica">Maestría en Ingen. Biomédica</option>
                    <option value="Maestría en Ingen. Civil">Maestría en Ingen. Civil</option>
                    <option value="Maestría en Ingen. Eléctrica">Maestría en Ingen. Eléctrica</option>
                    <option value="Maestría en Ingen. Indutrial">Maestría en Ingen. Indutrial</option>
                    <option value="Maestría en Ingen. Mecánica">Maestría en Ingen. Mecánica</option>
                    <option value="Maestría en Ingen. Química">Maestría en Ingen. Química</option>
                    <option value="Maestría en Ingen. Sistemas y Compu.">Maestría en Ingen. Sistemas y Compu.</option>
                    <option value="Maestría en Literatura">Maestría en Literatura</option>
                    <option value="Maestría en Mercadeo">Maestría en Mercadeo</option>
                    <option value="Maestría en Música">Maestría en Música</option>
                    <option value="Maestría en Periodismo">Maestría en Periodismo</option>
                    <option value="Maestría en Políticas Públicas">Maestría en Políticas Públicas</option>
                    <option value="Maestría en Psicología">Maestría en Psicología</option>
                    <option value="Maestría en Química">Maestría en Química</option>
                    <option value="Maestría en Regulación">Maestría en Regulación</option>
                    <option value="Maestría en Seguridad de Información">Maestría en Seguridad de Información</option>
                    <option value="Maestría en Sociología">Maestría en Sociología</option>
                    <option value="Maestría en Tributación">Maestría en Tributación</option>
                    <option value="Maestría Gest. Cadena Suministros">Maestría Gest. Cadena Suministros</option>
                    <option value="Maestría Propiedad Intelectual">Maestría Propiedad Intelectual</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="MBA Ejecutivo">MBA Ejecutivo</option>
                    <option value="Medicina">Medicina</option>
                    <option value="Microbiología">Microbiología</option>
                    <option value="Música">Música</option>
                    <option value="Narrativas Digitales">Narrativas Digitales</option>
                    <option value="Otro">Otro</option>
                    <option value="Postgr. Salud Pública">Postgr. Salud Pública</option>
                    <option value="Postgrados Medicina">Postgrados Medicina</option>
                    <option value="Psicología">Psicología</option>
                    <option value="Química">Química</option>
                    <option value="Sociología">Sociología</option>
                </select>
            </div>
            <div class="btn-group registerControl">
                <select class="form-control" name="doble_programa" id="doble_programa" required disabled>
                    <option disabled selected value="">Doble Programa *</option>
                    <option value="NO" >NO</option>    
                    <option value="Administración">Administración</option>
                    <option value="Antropología">Antropología</option>
                    <option value="Arquitectura">Arquitectura</option>
                    <option value="Arte">Arte</option>
                    <option value="Automatización de Proc. Indust.">Automatización de Proc. Indust.</option>
                    <option value="Biología">Biología</option>
                    <option value="CIDER">CIDER</option>
                    <option value="Ciencia Política">Ciencia Política</option>
                    <option value="Ciencias Sociales">Ciencias Sociales</option>
                    <option value="Contaduría Internacional">Contaduría Internacional</option>
                    <option value="Derecho">Derecho</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Doctorado en Administración">Doctorado en Administración</option>
                    <option value="Doctorado en Antropología">Doctorado en Antropología</option>
                    <option value="Doctorado en Biología">Doctorado en Biología</option>
                    <option value="Doctorado en Ciencia Política">Doctorado en Ciencia Política</option>
                    <option value="Doctorado en Derecho">Doctorado en Derecho</option>
                    <option value="Doctorado en Economía">Doctorado en Economía</option>
                    <option value="Doctorado en Educación">Doctorado en Educación</option>
                    <option value="Doctorado en Estu. Interdisc. Sobre Drllo.">Doctorado en Estu. Interdisc. Sobre Drllo.</option>
                    <option value="Doctorado en Filosofía">Doctorado en Filosofía</option>
                    <option value="Doctorado en Física">Doctorado en Física</option>
                    <option value="Doctorado en Gest. Innovac. Tecnol.">Doctorado en Gest. Innovac. Tecnol.</option>
                    <option value="Doctorado en Historia">Doctorado en Historia</option>
                    <option value="Doctorado en Ingeniería">Doctorado en Ingeniería</option>
                    <option value="Doctorado en Literatura">Doctorado en Literatura</option>
                    <option value="Doctorado en Matemáticas">Doctorado en Matemáticas</option>
                    <option value="Doctorado en Pscicología">Doctorado en Pscicología</option>
                    <option value="Doctorado en Química">Doctorado en Química</option>
                    <option value="Economía">Economía</option>
                    <option value="Educación">Educación</option>
                    <option value="EGIE- Espec. Gest. Instituciones Educativas">EGIE- Espec. Gest. Instituciones Educativas</option>
                    <option value="Esp. Dere. Minero Energ. Des. Soste.">Esp. Dere. Minero Energ. Des. Soste.</option>
                    <option value="Espec. Administración Financiera">Espec. Administración Financiera</option>
                    <option value="Espec. Automatización de Procesos Industriales">Espec. Automatización de Procesos Industriales</option>
                    <option value="Espec. Currículo y Pedagogía">Espec. Currículo y Pedagogía</option>
                    <option value="Espec. Derec. Negoc. Internacionales">Espec. Derec. Negoc. Internacionales</option>
                    <option value="Espec. Derecho de la Empresa">Espec. Derecho de la Empresa</option>
                    <option value="Espec. Desarrollo de Videojuegos">Espec. Desarrollo de Videojuegos</option>
                    <option value="Espec. En Estado, Políticas Públicas y Drrllo.">Espec. En Estado, Políticas Públicas y Drrllo.</option>
                    <option value="Espec. Evaluación Social de Proyectos">Espec. Evaluación Social de Proyectos</option>
                    <option value="Espec. Gerencia de Abastec. Estratégico">Espec. Gerencia de Abastec. Estratégico</option>
                    <option value="Espec. Gestión de Instituciones Educativas">Espec. Gestión de Instituciones Educativas</option>
                    <option value="Espec. Gestión y Planificación Territorial">Espec. Gestión y Planificación Territorial</option>
                    <option value="Espec. Ingen. De Sistemas Hídricos Urbanos">Espec. Ingen. De Sistemas Hídricos Urbanos</option>
                    <option value="Espec. Inteligencia de Mercados">Espec. Inteligencia de Mercados</option>
                    <option value="Espec. Legislación Financiera">Espec. Legislación Financiera</option>
                    <option value="Espec. Manejo integrado del Medio Ambiente">Espec. Manejo integrado del Medio Ambiente</option>
                    <option value="Espec. Negociación">Espec. Negociación</option>
                    <option value="Espec. Organizaciones, Respon. Social y Drrllo.">Espec. Organizaciones, Respon. Social y Drrllo.</option>
                    <option value="Espec. Sistemas de Transmi. Y Distrib. De Ener. Eléc.">Espec. Sistemas de Transmi. Y Distrib. De Ener. Eléc.</option>
                    <option value="Especia. Gestión Pública">Especia. Gestión Pública</option>
                    <option value="Especialización Derecho Comercial">Especialización Derecho Comercial</option>
                    <option value="Especialización en Economía">Especialización en Economía</option>
                    <option value="Especialización en Epidemiología">Especialización en Epidemiología</option>
                    <option value="Especialización en Pediatría">Especialización en Pediatría</option>
                    <option value="Especialización en Tributación">Especialización en Tributación</option>
                    <option value="Filosofía">Filosofía</option>
                    <option value="Física">Física</option>
                    <option value="Geociencias">Geociencias</option>
                    <option value="Historia">Historia</option>
                    <option value="Historia del Arte">Historia del Arte</option>
                    <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                    <option value="Ingeniería Biomédica ">Ingeniería Biomédica </option>
                    <option value="Ingeniería Civil">Ingeniería Civil</option>
                    <option value="Ingeniería de Alimentos">Ingeniería de Alimentos</option>
                    <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                    <option value="Ingeniería Eléctrica">Ingeniería Eléctrica</option>
                    <option value="Ingeniería Electrónica">Ingeniería Electrónica</option>
                    <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                    <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                    <option value="Ingeniería Química">Ingeniería Química</option>
                    <option value="Lenguas y Cultura">Lenguas y Cultura</option>
                    <option value="Licenciatura en Artes">Licenciatura en Artes</option>
                    <option value="Licenciatura en Biología">Licenciatura en Biología</option>
                    <option value="Licenciatura en Educación Infantil">Licenciatura en Educación Infantil</option>
                    <option value="Licenciatura en Español y Filología">Licenciatura en Español y Filología</option>
                    <option value="Licenciatura en Filosofía">Licenciatura en Filosofía</option>
                    <option value="Licenciatura en Física">Licenciatura en Física</option>
                    <option value="Licenciatura en Historia">Licenciatura en Historia</option>
                    <option value="Licenciatura en Matemáticas">Licenciatura en Matemáticas</option>
                    <option value="Licenciatura en Química">Licenciatura en Química</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Maes. en Arquitectura de TI">Maes. en Arquitectura de TI</option>
                    <option value="Maest. Biología Computacional">Maest. Biología Computacional</option>
                    <option value="Maest. Dere. Gob. Y Gest. Justicia">Maest. Dere. Gob. Y Gest. Justicia</option>
                    <option value="Maest. Derecho Internacional">Maest. Derecho Internacional</option>
                    <option value="Maest. Diseño Proces. Y Product.">Maest. Diseño Proces. Y Product.</option>
                    <option value="Maest. Educación Matemática ">Maest. Educación Matemática </option>
                    <option value="Maest. En Der. Público Gest. Admin. ">Maest. En Der. Público Gest. Admin. </option>
                    <option value="Maest. En Estudios Culturales">Maest. En Estudios Culturales</option>
                    <option value="Maest. En Gerencia Ambiental">Maest. En Gerencia Ambiental</option>
                    <option value="Maest. En investig. En Admon.">Maest. En investig. En Admon.</option>
                    <option value="Maest. Estudios Inter. Sobre Desarrollo">Maest. Estudios Inter. Sobre Desarrollo</option>
                    <option value="Maest. Estudios Internacionales">Maest. Estudios Internacionales</option>
                    <option value="Maest. Estudios sobre Sustenibilidad">Maest. Estudios sobre Sustenibilidad</option>
                    <option value="Maest. Geren. Y Prac. Drllo.">Maest. Geren. Y Prac. Drllo.</option>
                    <option value="Maest. Gerenc. Y Prac. Drllo.">Maest. Gerenc. Y Prac. Drllo.</option>
                    <option value="Maest. Gerencia Estratégica">Maest. Gerencia Estratégica</option>
                    <option value="Maest. Gest. Estra. Proy. De Arquitectura">Maest. Gest. Estra. Proy. De Arquitectura</option>
                    <option value="Maest. Gest. Innovac. Tecnol.">Maest. Gest. Innovac. Tecnol.</option>
                    <option value="Maest. Humanidades Digitales">Maest. Humanidades Digitales</option>
                    <option value="Maest. Ingen. Electr. Y de Computadores">Maest. Ingen. Electr. Y de Computadores</option>
                    <option value="Maest. Ingenier. De información">Maest. Ingenier. De información</option>
                    <option value="Maest. Ingeniería de Petroleos">Maest. Ingeniería de Petroleos</option>
                    <option value="Maest. Ingeniería de Software">Maest. Ingeniería de Software</option>
                    <option value="Maest. Intelig. Analit. Toma Decisiones">Maest. Intelig. Analit. Toma Decisiones</option>
                    <option value="Maest. Internacional en Finanzas">Maest. Internacional en Finanzas</option>
                    <option value="Maest. Patrimonio Cultural Mueble">Maest. Patrimonio Cultural Mueble</option>
                    <option value="Maest. Piscolog. Clinica y Salud">Maest. Piscolog. Clinica y Salud</option>
                    <option value="Maest. Tecnolog. Informac. Negoc.">Maest. Tecnolog. Informac. Negoc.</option>
                    <option value="Maestr. Planifi. Urbana y Regional">Maestr. Planifi. Urbana y Regional</option>
                    <option value="Maestría en Administración">Maestría en Administración</option>
                    <option value="Maestría en Antropología">Maestría en Antropología</option>
                    <option value="Maestría en Arquitectura">Maestría en Arquitectura</option>
                    <option value="Maestría en Artes Plast. Elect. Y T.">Maestría en Artes Plast. Elect. Y T.</option>
                    <option value="Maestría en Ciencia Política">Maestría en Ciencia Política</option>
                    <option value="Maestría en Ciencias - Física">Maestría en Ciencias - Física</option>
                    <option value="Maestría en Ciencias Biológicas">Maestría en Ciencias Biológicas</option>
                    <option value="Maestría en Construcción de Paz">Maestría en Construcción de Paz</option>
                    <option value="Maestría en Derecho">Maestría en Derecho</option>
                    <option value="Maestría en Derecho Privado">Maestría en Derecho Privado</option>
                    <option value="Maestría en Diseño">Maestría en Diseño</option>
                    <option value="Maestría en Economía">Maestría en Economía</option>
                    <option value="Maestría en Economía Aplicada">Maestría en Economía Aplicada</option>
                    <option value="Maestría en Educación">Maestría en Educación</option>
                    <option value="Maestría en Epidemiología">Maestría en Epidemiología</option>
                    <option value="Maestría en Estudios Clásicos">Maestría en Estudios Clásicos</option>
                    <option value="Maestría en Filosofía">Maestría en Filosofía</option>
                    <option value="Maestría en Finanzas">Maestría en Finanzas</option>
                    <option value="Maestría en Género">Maestría en Género</option>
                    <option value="Maestría en Geografía">Maestría en Geografía</option>
                    <option value="Maestría en Gestión Pública">Maestría en Gestión Pública</option>
                    <option value="Maestría en Historia">Maestría en Historia</option>
                    <option value="Maestría en Historia del Arte">Maestría en Historia del Arte</option>
                    <option value="Maestría en Ingen. Ambiental">Maestría en Ingen. Ambiental</option>
                    <option value="Maestría en Ingen. Biomédica">Maestría en Ingen. Biomédica</option>
                    <option value="Maestría en Ingen. Civil">Maestría en Ingen. Civil</option>
                    <option value="Maestría en Ingen. Eléctrica">Maestría en Ingen. Eléctrica</option>
                    <option value="Maestría en Ingen. Indutrial">Maestría en Ingen. Indutrial</option>
                    <option value="Maestría en Ingen. Mecánica">Maestría en Ingen. Mecánica</option>
                    <option value="Maestría en Ingen. Química">Maestría en Ingen. Química</option>
                    <option value="Maestría en Ingen. Sistemas y Compu.">Maestría en Ingen. Sistemas y Compu.</option>
                    <option value="Maestría en Literatura">Maestría en Literatura</option>
                    <option value="Maestría en Mercadeo">Maestría en Mercadeo</option>
                    <option value="Maestría en Música">Maestría en Música</option>
                    <option value="Maestría en Periodismo">Maestría en Periodismo</option>
                    <option value="Maestría en Políticas Públicas">Maestría en Políticas Públicas</option>
                    <option value="Maestría en Psicología">Maestría en Psicología</option>
                    <option value="Maestría en Química">Maestría en Química</option>
                    <option value="Maestría en Regulación">Maestría en Regulación</option>
                    <option value="Maestría en Seguridad de Información">Maestría en Seguridad de Información</option>
                    <option value="Maestría en Sociología">Maestría en Sociología</option>
                    <option value="Maestría en Tributación">Maestría en Tributación</option>
                    <option value="Maestría Gest. Cadena Suministros">Maestría Gest. Cadena Suministros</option>
                    <option value="Maestría Propiedad Intelectual">Maestría Propiedad Intelectual</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="MBA Ejecutivo">MBA Ejecutivo</option>
                    <option value="Medicina">Medicina</option>
                    <option value="Microbiología">Microbiología</option>
                    <option value="Música">Música</option>
                    <option value="Narrativas Digitales">Narrativas Digitales</option>
                    <option value="Otro">Otro</option>
                    <option value="Postgr. Salud Pública">Postgr. Salud Pública</option>
                    <option value="Postgrados Medicina">Postgrados Medicina</option>
                    <option value="Psicología">Psicología</option>
                    <option value="Química">Química</option>
                    <option value="Sociología">Sociología</option>
                </select>
            </div>
            <div class="btn-group registerControl">
                <select id="country" class="form-control" name="country" required >
                    <option disabled selected>{{ __('country') }} * </option>                    
                        @foreach($countries as $country)
                            <option value='{{ $country->name }}'>{{ $country->name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="btn-group registerControl">
                <select id="depto" class="form-control" name="depto" required disabled>
                    <option disabled selected value="">Departamento *</option>                    
                    <option value="AMAZONAS">AMAZONAS</option>
                    <option value="ANTIOQUIA">ANTIOQUIA</option>
                    <option value="ARAUCA">ARAUCA</option>
                    <option value="ATLANTICO">ATLANTICO</option>
                    <option value="BOGOTÁ">BOGOTÁ</option>
                    <option value="BOLIVAR">BOLIVAR</option>
                    <option value="BOYACA">BOYACA</option>
                    <option value="CALDAS">CALDAS</option>
                    <option value="CAQUETA">CAQUETA</option>
                    <option value="CASANARE">CASANARE</option>
                    <option value="CAUCA">CAUCA</option>
                    <option value="CESAR">CESAR</option>
                    <option value="CHOCO">CHOCO</option>
                    <option value="CORDOBA">CORDOBA</option>
                    <option value="CUNDINAMARCA">CUNDINAMARCA</option>
                    <option value="GUAVIARE">GUAVIARE</option>
                    <option value="HUILA">HUILA</option>
                    <option value="LA GUAJIRA">LA GUAJIRA</option>
                    <option value="MAGDALENA">MAGDALENA</option>
                    <option value="META">META</option>
                    <option value="NARIÑO">NARIÑO</option>
                    <option value="NORTE DE SANTANDER">NORTE DE SANTANDER</option>
                    <option value="PUTUMAYO">PUTUMAYO</option>
                    <option value="QUINDIO">QUINDIO</option>
                    <option value="RISARALDA">RISARALDA</option>
                    <option value="SANTANDER">SANTANDER</option>
                    <option value="SUCRE">SUCRE</option>
                    <option value="TOLIMA">TOLIMA</option>
                    <option value="VALLE DEL CAUCA">VALLE DEL CAUCA</option>
                    <option value="VAUPES">VAUPES</option>
                    <option value="VICHADA">VICHADA</option>
                </select>
            </div>
            <div class="form-group">                
                <input id="city" type="text" class="form-control registerControl @error('city') is-invalid @enderror" placeholder="{{ __('city') }} *" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            
        </div>
        <div class="accionsregister">
            <div class="accionsAcept">
                <a href="" class="tipo-crimson">Politica de privacidad y protección de datos
                    personales - Universidad de los Andes</a>
                <label><input type="checkbox" id="cbox1" value="terminos" required> Aceptar los
                    términos y condiciones</label><br>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Envía Datos
        </button>
    </form>

</div>
<?php
$lang['admin']['pagedefaultsupdated'] = 'Configuraciones por defecto de p&aacute;gina actualizadas.';
$lang['admin']['help_function_module_available'] = '<h3>&iquest;Esto que hace?</h3>
<p>Un plugin para probar si un m&oacute;dulo dado (por su nombre) est&aacute; instalado, y disponible para su uso</p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<ul>
<li><strong>(required)module</strong> - (string) El nombre del m&oacute;dulo.</li>
<li><em>(optional)assign</em> - Asigna la salida del plugin a la variable smarty nombrada.</li>
</ul>
<h3>Ejemplo:</h3>
{module_available module=&#039;News&#039; assign=&#039;havenews&#039;}{if $havenews}{cms_module module=News}{/if}
<h3>Nota:</h3>
<p>No se puede usar la forma corta de la llamada al m&oacute;dulo, p.e. <em>{News}</em> en este tipo de expresi&oacute;n.</p>';
$lang['admin']['prettyurls_noeffect'] = 'Pretty URLS No est&aacute; configurado... esta url no tendr&aacute; efecto';
$lang['admin']['help_function_cms_lang_info'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este plugin retorna un objeto conteniendo la informaci&oacute;n que tiene CMSMS acerca del idioma seleccionado. Esto puede incluir informaci&oacute;n de localizaci&oacute;n, codificaciones, alias de lenguate etc.</p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<ul>
<li><em>(optional)lang</em> - El idioma del cual se desea obtener informaci&oacute;n. Si el par&aacute;metro de lenguaje no se especifica, utilizar&aacute; la informaci&oacute;n del idioma actual.</li>
<li><em>(optional)assign</em> - Asigna la salida del plugin a la variable smarty nombrada.</li>
</ul>
<h3>Ejemplo:</h3>
<pre>{cms_lang_info assign=&#039;nls&#039;}{$nls->locale()}</pre>
<h3>Vea tambi&eacute;n:</h3>
<p>the CmsNls class documentation.</p>';
$lang['admin']['help_function_cms_set_language'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este plugin intenta  seleccionar el lenguaje actual para usarlo en la traducci&oacute;n de cadenas y formatos de fecha para el lenguaje especificado. el idioma especificado debe ser reconocido por CMSMS(el archivo nls debe existir). Cuando esta funci&oacute;n es llamada, (y a menos que la funci&oacute;n est&eacute; reemplazada en el archivo config.php) se har&aacute; un intento para localizar el sitio con la configuraci&oacute;n local asociada al idioma. La localizaci&oacute;n para el idioma debe estar instalada en el servidor.</p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<ul>
<li><strong>(required)lang</strong> - El lenguaje deseado. El idioma debe ser reconocido por CMSMS (el archivo nls debe existir).</li>
</ul>';
$lang['admin']['help_function_cms_get_language'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este plugin retorna el nombre del idioma actual de CMSMS. El idioma es utilizado para la traducci&oacute;n de cadenas y formateo de fechas.</p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<ul>
<li><em>(optional)assign</em> - Asigna la salida del plugin a la variable smarty nombrada.</li>
</ul>';
$lang['admin']['help_modifier_cms_escape'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este modificador se usa para escapar las cadenas en una de muchas maneras. Puede ser usado para convertir cadenas en m&uacute;ltiples formatos de visualizaci&oacute;n, o para hacer que datos introducidos por el usuario con caracteres especiales sean mostrables en la p&aacute;gina web est&aacute;ndar.</p>
<h3>Uso:</h3>
<pre><code>{$some_var_with_text|cms_escape[:<escape type>|[<character set>]]}</code></pre>
<h4>Tipos V&aacute;lidos de Escape:</h4>
<ul>
<li>html <em>(default)</em> - Utiliza caracteres epseciales html.</li>
<li>htmlall - Usa entidades html.</li>
<li>url - codifica todas las entidades url en formato raw.</li>
<li>urlpathinfo - Similar al tipo de escape url, pero tambi&eacute;n codifica /.</li>
<li>quotes - Escapa comillas simples (ap&oacute;strofe) sin escapar.</li>
<li>hex - Escapa cada caracter en hex.</li>
<li>hexentity - Codifica en hex cada caracter.</li>
<li>decentity - Codifica en decimal cada caracter.</li>
<li>javascript - Escapa comillas dobles, diagonales invertidas, saltos de l&iacute;nea, etc.</li>
<li>mail - Codifica una direcci&oacute;n de email en algo que sea seguro para mostrar.</li>
<li>nonstd - Escapa caracteres no est&aacute;ndar, como citas de documentos.</li>
</ul>
<h4>Juego de Caracteres::</h4>
<p>Si el juego de Caracteres no se especifica, se asume utf-8. El juego de caracteres solo es aplicable para los tipos de escape &quot;html&quot; y &quot;htmlall&quot;.</p>';
$lang['admin']['help_modifier_cms_date_format'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este modificador es usado para formatear fechas en un formato adecuado. Utiliza los par&aacute;metros est&aacute;ndar de strftime. Si no se espec&iacute;fica cadena de formato, el sistema utilizar&aacute; el formateo de cadenas de fecha preferido por el usuario (para usuarios con sesi&oacute;n iniciada) o la preferencia de formato de fecha del sistema.</p>
<p>Este modificado es cap&aacute;z de interpretar fechas en muchos formatos, p.e. cadenas de fecha-hora de la base de datos, o timestamps enteros generados por la funci&oacute;n time().</p>
<h3>Uso:</h3>
<pre><code>{$some_date_var|cms_date_format[:<format string>]}</code></pre>
<h3>Ejemplo:</h3>
<pre><code>{&#039;2012-03-24 22:44:22&#039;|cms_date_format}</code></pre>';
$lang['admin']['help_modifier_summarize'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este modificador es usado para truncar una secuencia larga de texto en un n&uacute;mero limitado de &quot;palabras&quot;.</p>
<h3>Uso:</h3>
<pre><code>{$some_var_with_long_text|summarize:<n&uacute;meror>}</code></pre>
<h3>Ejemplo:</h3>
<p>El siguiente ejemplo elimina todas las etiquetas html del contenido y lo trunca despu&eacute;s de 50 caracteres.</p>
<pre><code>{content|strip_tags|summarize:50}</code></pre>';
$lang['admin']['module_param_lang'] = '<strong>Obsoleto</strong> - Ignorar el lenguaje actual usado para seleccionar textos traducidos.';
$lang['admin']['server_db_grants'] = 'Comprobar niveles de acceso a la base de datos';
$lang['admin']['error_nograntall_found'] = 'No se pudo encontrar un permiso &quot;GRANT ALL&quot; (permitir todo) aplicable. Esto podr&iacute;a significar que podr&iacute;a estar teniendo problemas al instalar o remover m&oacute;dulos. O incluso a&ntilde;adiendo y elimnando elementos, incluyendo p&aacute;ginas';
$lang['admin']['msg_grantall_found'] = 'Se encontr&oacute; una sentencia &quot;GRANT ALL&quot; que aparente ser aplicable';
$lang['admin']['curlversion'] = 'Probar versi&oacute;n curl';
$lang['admin']['curl'] = 'Probar la librer&iacute;a curl';
$lang['admin']['test_curl'] = 'Probar la disponibilidad de curl';
$lang['admin']['test_curlversion'] = 'Probar Versi&oacute;n de CURL';
$lang['admin']['curl_versionstr'] = 'version %s. La m&iacute;nima recomendadada es %s';
$lang['admin']['lines_in_error'] = '%d l&iacute;neas con errores';
$lang['admin']['no_files_scanned'] = 'No se escanearon archivos durante el proceso de verificaci&oacute;n (tal vez el archivo es invalido)';
$lang['admin']['stylesheetnotfound'] = 'No se encontr&oacute; la hoja de estilo %d ';
$lang['admin']['sysmain_updateurls'] = 'Actualizar rutas';
$lang['admin']['sysmain_confirmupdateurls'] = '&iquest;Est&aacute; seguro de querer refrescar la ruta de la base de datos?';
$lang['admin']['routesrebuilt'] = 'Las rutas de la base de datos ha sido reconstruida.';
$lang['admin']['text_changeowner'] = 'Configurar las p&aacute;ginas seleccionadas para otro usuario';
$lang['admin']['changeowner'] = 'Cambiar propietario';
$lang['admin']['xmlreader_class'] = 'Comprobando la clase XMLReader';
$lang['admin']['info_smarty_cacheudt'] = 'If enabled, all calls to user defined tags will be cached.  This will be useful for tags that display the output of database queries.  You can disable caching using the nocache parameter in the udt call.  i.e: <code>{myusertag nocache}</code>';
$lang['admin']['prompt_smarty_cacheudt'] = 'Poner en cache las llamadas de UDT';
$lang['admin']['always'] = 'Siempre';
$lang['admin']['never'] = 'Nunca';
$lang['admin']['moduledecides'] = 'El m&oacute;dulo decide';
$lang['admin']['info_smarty_cachemodules'] = 'Select how to cache tags in various templates that call module actions.  If enabled, all module calls will be cached.  This may have negative effects on some modules, or modules with forms.  <em>(note: you can override this using the nocache option as described in the smarty manual)</em>.  If disabled no module calls will be cached which may have an effect on performance.   If you select to allow the module to decide, the default is that caching is not performed.  The module can override this, and you can disable caching using the nocache parameter when calling the module.';
$lang['admin']['prompt_smarty_cachemodules'] = 'Poner en cache las llamadas de m&oacute;dulos';
$lang['admin']['info_smarty_compilecheck'] = 'If disabled, smarty will not check the modification dates of templates to see if they have been modified.  This can significantly improve performance.  However performing any template change (or even some content changes) may require a cache clearing';
$lang['admin']['prompt_smarty_compilecheck'] = 'Do a Compilation Check';
$lang['admin']['info_smarty_options'] = 'The following options have effect only when the above caching options are enabled';
$lang['admin']['info_smarty_caching'] = 'When enabled, the output from various plugins will be cached to increase performance.  This only applies to output on content pages marked as cachable, and only for non-admin users.  Note, this functionality may interfere with the behavior of some modules or plugins, or plugins that use non-inline forms.';
$lang['admin']['prompt_use_smartycaching'] = 'Habilitar cacheo de Smarty';
$lang['admin']['smarty_settings'] = 'Ajustes de Smarty';
$lang['admin']['help_function_cms_init_editor'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este plugin se usa para inicializar el editor WYSIWYG a mostrar cuando las funcionalidades WYSIWYG son requeridas para el env&iacute;o de datos en el frontend. Este m&oacute;dulo encontrar&aacute; el WYSIWYG seleccionado, determinar&aacute; si ha sido solicitado, y de ser as&iacute; genereara el c&oacute;digo html apropiado <em>usualmente enlaces javascript</em> de tal manera que el WYSIWYG se inicialice apropiadamente cuando la p&aacute;gina sea cargada. Si ning&uacute;n editor es solicitado para la petici&oacute;n del frontend, este plugin no generar&aacute; ninguna salida.</p>
  <p><strong>Nota:</strong> Este plugin trabajar&aacute; de manera adecuada dada las configuraciones por defecto de CMSMS. Si usted ha modificado la variable de configuraci&oacute;n &quot;process_whole_template&quot;(procesar toda la plantilla) desed su valor por defecto, puede ajustar los par&aacute;metros suministrados a este plugin.</p>
<h3>&iquest;Como se usa?</h3>

<p>La primera cosa que hay que hacer, es seleccionar el editor WYSIWYG que se usar&aacute; en el frontend. Esto se hace desde la p&aacute;gina CONFIGURACIONES GLOBALES DEL SITIO (o configuraciones por defecto) de la consola administrativa. Despu&eacute;s, si utiliza  editores WYSIWYG en distintas p&aacute;ginas, tal vez el mejor lugar para colocar la etiqueta del plugin {cms_init_editor} sea directamente en la plantilla de la p&aacute;gina. Si solamente necesita el editor WYSIWYG activado en un n&uacute;mero limitadod e p&aacute;ginas, puede colocarlo en el campo &quot;Metada espec&iacute;fica de esta p&aacute;gina&quot; en la pesta&ntilde;a &quot;Avanzada&quot; de cada p&aacute;gina donde lo necesite.</p>
<ul>
<li><em>(opcional)wysiwyg</em> - Especifica el nombre del m&oacute;dulo editor wysiwyg a inicializar. Us&eacute;se con precacuci&oacute;n. si tiene otro editor wysiwyg seleccionado por defecto en las configuraciones globales, esto forzar&aacute; a usar el editor especificado.</li>
<li><em>(optional)force=0</em> - Normalmente este plugin no inicializar&aacute; el editor especificado (o detectado) si no ha sido marcado como &quot;activo&quot;. Este par&aacute;metor sobreescribe este comportamiento. Este par&aacute;metro puede ser requerido si la variable de configuraci&oacute;n &quot;process whole template&quot; est&aacute; configurada sin ning&uacute;n valor por defecto.</li>
<li><em>(optional)assign</em> - Asigna la salida del plugin a la variable smarty nombrada.</li>
</ul>';
$lang['admin']['info_pagedefaults'] = 'This form allows specifying various options as to the initial settings when creating new content pages.  The items in this page have no effect when editing existing pages';
$lang['admin']['default_contenttype'] = 'Tipo de Contenido por defecto';
$lang['admin']['info_default_contenttype'] = 'Applicable when adding new content objects, this control specifies the type that is selected by default.  Please ensure that the selected item is not one of the &quot;disallowed types&quot;.';
$lang['admin']['error_contenttype'] = 'The content type associated with this page is invalid or not permitted';
$lang['admin']['info_disallowed_contenttypes'] = 'Select which content types to remove from the content type dropdown when editing or adding content.  Use CTRL+Click to select, unselect items.  Having no selected items will indicate that all content types are allowed. <em>(applies to all users)</em>';
$lang['admin']['disallowed_contenttypes'] = 'Content Types that are NOT allowed';
$lang['admin']['search_module'] = 'Search module';
$lang['admin']['info_search_module'] = 'Select the module that should be used to index words for searching, and will provide the site search capabilities';
$lang['admin']['filecreatedirbadchars'] = 'Invalid characters were detected in the submitted directory name';
$lang['admin']['modulehelp_yourlang'] = 'Ver en su idioma.';
$lang['admin']['info_umask'] = 'The &quot;umask&quot; is an octal value that is used to specify the default permission for newly created files (this is used for files in the cache directory, and uploaded files.  For more information see the appropriate <a href="http://en.wikipedia.org/wiki/Umask">wikipedia article.</a>';
$lang['admin']['general_operation_settings'] = 'Configuraciones Generales de Operaci&oacute;n';
$lang['admin']['info_checkversion'] = 'Si est&aacute; activado, el sistema har&aacute; un chequeo diario para nuevas versiones de CMSMS';
$lang['admin']['checkversion'] = ' Permitir verificaciones peri&oacute;dicas de nuevas versiones';
$lang['admin']['actioncontains'] = 'La acci&oacute;n contiene';
$lang['admin']['filterapplied'] = 'Filtro actual';
$lang['admin']['automatedtask_success'] = 'Tarea automatizada realizada';
$lang['admin']['siteprefsupdated'] = 'Ajustes globales actualizados';
$lang['admin']['ip_addr'] = 'Direcci&oacute;n IP';
$lang['admin']['warn_admin_ipandcookies'] = 'Advertencia: Actividades administrativas usan cookies y rastrean su direcci&oacute;n IP';
$lang['admin']['event_desc_loginfailed'] = 'Enviado despu&eacute;s de que un usuario fall&oacute; para conectarse en el panel administrativo';
$lang['admin']['event_help_loginfailed'] = '<p>Enviado despu&eacute;s de que un usuario fall&oacute; para conectarse en el panel administrativo.</p>';
$lang['admin']['modulehelp_english'] = 'Ver en Ingl&eacute;s (English)';
$lang['admin']['nopluginabout'] = 'No se dispone de informaci&oacute;n para este plugin';
$lang['admin']['nopluginhelp'] = 'No se dispone de ayuda para este plugin';
$lang['admin']['moduleupgraded'] = 'Actualizaci&oacute;n Correcta';
$lang['admin']['added_css'] = 'Hoja de Estilo A&ntilde;adida';
$lang['admin']['toggle'] = 'Conmutar';
$lang['admin']['added_group'] = 'Grupo A&ntilde;adido';
$lang['admin']['expanded_xml'] = 'Archivo XML ampliado file consistente en %s %s';
$lang['admin']['installed_mod'] = 'Versi&oacute;n %s instalada';
$lang['admin']['uninstalled_mod'] = 'M&oacute;dulo %s desinstalado';
$lang['admin']['upgraded_mod'] = '%s Actualizado desde la versi&oacute;n %s a la %s';
$lang['admin']['edited_gcb'] = 'Bloque de Contenido Global Editado';
$lang['admin']['edited_content'] = 'Contenido Editado';
$lang['admin']['added_content'] = 'Contenido A&ntilde;adido';
$lang['admin']['added_css_association'] = 'Asociaci&oacute;n de Hoja de Estilo A&ntilde;adida';
$lang['admin']['deleted_group'] = 'Grupo Eliminado';
$lang['admin']['deleted_content'] = 'Contenido Eliminado';
$lang['admin']['edited_user'] = 'Usuario Editado';
$lang['admin']['edited_udt'] = 'Etiqueta Definida por Usuario Editada';
$lang['admin']['content_copied'] = 'Contenido de &Iacute;tem Copiado a %s';
$lang['admin']['deleted_template'] = 'Plantilla Eliminada';
$lang['admin']['added_udt'] = 'Etiqueta Definida por Usuario A&ntilde;adida';
$lang['admin']['deleted_udt'] = 'Etiqueta Definida por Usuario Eliminada';
$lang['admin']['added_gcb'] = 'Bloque de Contenido Global A&ntilde;adido';
$lang['admin']['edited_group'] = 'Grupo Editado';
$lang['admin']['deleted_css_association'] = 'Asociaci&oacute;n de Hoja de Estilo Eliminada';
$lang['admin']['user_logout'] = 'Desconexi&oacute;n del Usuario';
$lang['admin']['user_login'] = 'Identificaci&oacute;n de Usuario';
$lang['admin']['login_failed'] = 'Identificaci&oacute;n de Usuario Fallada';
$lang['admin']['deleted_css'] = 'Hoja de Estilo Eliminada';
$lang['admin']['uploaded_file'] = 'Fichero Subido';
$lang['admin']['created_directory'] = 'Directorio Creado';
$lang['admin']['deleted_file'] = 'Fichero Eliminado';
$lang['admin']['deleted_directory'] = 'Directorio Eliminado';
$lang['admin']['edited_template'] = 'Plantilla Editada';
$lang['admin']['deleted_user'] = 'Usuario Eliminado';
$lang['admin']['deleted_module'] = 'Eliminado permanentemente %s';
$lang['admin']['deleted_gcb'] = 'Bloque de Contenido Global Eliminado';
$lang['admin']['added_user'] = 'Usuari A&ntilde;adido';
$lang['admin']['edited_user_preferences'] = 'Preferencias de Usuario Editadas';
$lang['admin']['added_template'] = 'Plantilla A&ntilde;adida';
$lang['admin']['event_desc_stylesheetpostcompile'] = 'Enviado despu&eacute;s de que la hoja de estilo sea compilada mediante smarty';
$lang['admin']['event_desc_stylesheetprecompile'] = 'Enviado antes de que la hoja de estilo sea compilada mediante smarty';
$lang['admin']['confirm_uploadmodule'] = '&iquest;Est&aacute; seguro de querer subir el archivo XML seleccionado?. La subida incorrecta de un fichero de m&oacute;dulo puede romper la funcionalidad del sitio web.';
$lang['admin']['error_module_mincmsversion'] = 'Este m&oacute;dulo necesita una versi&oacute;n m&aacute;s moderna de CMS Made Simple';
$lang['admin']['info_browser_cache_expiry'] = 'Especificar la canticdad de tiempo (en minutos) que el navegador debera mantener el cache. Si se establece a 0, esta funcionalidad quedar&aacute; desabilitada.';
$lang['admin']['browser_cache_expiry'] = 'Periodo de Expiraci&oacute;n del Cache del Navegador (en minutos)</em>';
$lang['admin']['info_browser_cache'] = 'Aplicable solo a p&aacute;ginas cacheable, este ajuste indica que el navegador deber&aacute; permitir dejar las paginas en el cach&eacute; por un tiempo determinado. Si se activa, puede que visitantes frecuentes no vean los cambios en el contenido de sus paginas inmediatamente.';
$lang['admin']['allow_browser_cache'] = 'Permitir que el Navegador ponga las paginas en Cache';
$lang['admin']['server_cache_settings'] = 'Ajustes de la Cach&eacute; del Servidor';
$lang['admin']['browser_cache_settings'] = 'Ajustes de la Cach&eacute; del Navegador';
$lang['admin']['help_function_browser_lang'] = '<h3>&iquest;Esto que hace?</h3>
  <p>This plugin detects and outputs the language that the users browser accepts, and cross references it with a list of allowed languages to determine a language value for the session.</p>
<h3>&iquest;Como se usa?</h3>
<p>Insert the tag early into your page template <em>(it can go above the <head> section if you want)</em> and provide it the name of the default language, and the accepted languages (only two character language names are accepted), then do something with the result.  i.e:</p>
<pre><code>{browser_lang accept=de,fr,en,es default=en assign=tmp}{session_put var=lang val=$tmp}</code></pre>
<p><em>({session_put} is a plugin provided by the CGSimpleSmarty module)</em></p>
<h3>What Parameters does it Take?</h3>
<ul>
<li><strong>accepted <em>(required)</em></strong><br/> - A comma separated list of two character language names that are accepted.</li>
<li>default<br/>- <em>(optional)</em> A default language to output if no accepted language was supported by the browser.  en is used if no other value is specified.</li>
<li>assign<br/>- <em>(optional)</em> The name of the smarty variable to assign the results to.  If not specified the results of this function are returned.</li>
</ul>';
$lang['admin']['info_target'] = 'Esta opci&oacute;n puede ser usada por el Administrador de Menus para indicar cuando y c&oacute;mo se deber&aacute;n abrir nuevas pesta&ntilde;as o ventanas. Algunas plantillas de men&uacute; puede que ignoren esta opci&oacute;n.';
$lang['admin']['close'] = 'Cerrar';
$lang['admin']['open'] = 'Abrir';
$lang['admin']['revert'] = 'Anular todos los cambios';
$lang['admin']['autoclearcache2'] = 'Eliminar los archivos de cach&eacute; anteriores al n&uacute;mero de d&iacute;as especificado';
$lang['admin']['root'] = 'Ra&iacute;z';
$lang['admin']['info_content_autocreate_flaturls'] = 'Si se habilita, todas las URL se crear&aacute;n como una copia del alias de la p&aacute;gina (pero no estar&aacute; sincronizado con el alias de la p&aacute;gina)';
$lang['admin']['content_autocreate_flaturls'] = 'Automatically created URL&#039;s are flat';
$lang['admin']['content_autocreate_urls'] = 'Crear URL&#039;s de p&aacute;gina de forma autom&aacute;tica';
$lang['admin']['content_mandatory_urls'] = 'Se necesitan URLS de p&aacute;gina';
$lang['admin']['content_imagefield_path'] = 'Ruta al campo de imagen';
$lang['admin']['info_content_imagefield_path'] = 'Relativo a la ruta de cargas de imagenes, especificar un nombre de directorio que contiene la ruta la cual contiene los archivos para el campo de imagenes';
$lang['admin']['content_thumbnailfield_path'] = 'Ruta al campo vista en miniatura';
$lang['admin']['info_content_thumbnailfield_path'] = 'Relativo a la ruta de cargas,  especificar un nombre de directorio que contiene la ruta la cual contiene los archivos para el campo de imagenes. Usualmente esta ser&aacute; la misma que la ruta (ver arriba).';
$lang['admin']['contentimage_path'] = 'Ruta para la etiqueta {content_image}';
$lang['admin']['info_contentimage_path'] = 'Relativo a la ruta de cargas,  especificar un nombre de directorio que contiene la ruta la cual contiene los archivos para la etiqueta {content_image}. Este valor es usado como predeterminado para el parametro &#039;dir&#039;';
$lang['admin']['editcontent_settings'] = 'Ajustes del Editor de Contenido';
$lang['admin']['help_page_url'] = 'Specify an alternat URL (relative to the root of your website) that can be used to uniquely identify this page.  i.e: path/to/mypage';
$lang['admin']['help_page_alias'] = 'El alias es usado como alternativa al id de pagina para identificar  una pagina. Debera ser unica entre todas las paginas. El alias tambien es usado para crear el URL de la pagina,';
$lang['admin']['help_page_searchable'] = 'This setting indicates whether the content for this page should be indexed by the search engine';
$lang['admin']['help_page_cachable'] = 'El desempe&ntilde;o puede ser mejorado al establecer cuantas paginas sea posible como cacheables. Sin embargo, esto no puede ser usado para paginas donde el contenido es cambiado frecuentemente.';
$lang['admin']['sitedownexcludeadmins'] = 'Exclude logged in administrators';
$lang['admin']['your_ipaddress'] = 'Su direcci&oacute;n de IP es';
$lang['admin']['use_wysiwyg'] = 'Usar WYSIWYG';
$lang['admin']['contenttype_redirlink'] = 'Elance de redireccionamiento';
$lang['admin']['yes'] = 'S&iacute;';
$lang['admin']['no'] = 'No ';
$lang['admin']['listcontent_showalias'] = 'Mostrar columna de &quot;Alias&quot; ';
$lang['admin']['listcontent_showurl'] = 'Mostrar la columna &quot;URL&quot; ';
$lang['admin']['listcontent_showtitle'] = 'Mostrar el t&iacute;tulo de la p&aacute;gina o el texto para el men&uacute;';
$lang['admin']['listcontent_settings'] = 'Ajustes de listado de contenido';
$lang['admin']['lctitle_page'] = 'El titulo de contenido existente';
$lang['admin']['lctitle_alias'] = 'El alias de elementos de contenido. Algunos elementos no tienen alias.';
$lang['admin']['lctitle_url'] = 'El sufijo del URL para el contenido, si est&aacute; establecido.';
$lang['admin']['lctitle_template'] = 'Plantilla seleccionada para el contenido. Algunos elementos de contenido no tienen plantillas.';
$lang['admin']['lctitle_owner'] = 'El propietario del contenido';
$lang['admin']['lctitle_active'] = 'Indicates wether the content item is active. Inactive items cannot be displayed.';
$lang['admin']['lctitle_default'] = 'Especificar el contenido que es accesado cuando la url raiz es solicitada. Solo se puede establecer un elemento por defecto';
$lang['admin']['lctitle_move'] = 'Permite ordenar la jerarquia del contenido';
$lang['admin']['lctitle_multiselect'] = 'Seleccionar todo/nada';
$lang['admin']['invalid_url2'] = 'The page URL specified is invalid.  It should contain only alphanumeric characters, or - or /.  Extensions must contain only alphanumeric chars and be less than 5 characters in length.  It is also possible that the URL specified is already in use.';
$lang['admin']['page_url'] = 'URL de la p&aacute;gina';
$lang['admin']['runuserplugin'] = 'Ejecutar Plugin del Usuario';
$lang['admin']['output'] = 'Salida';
$lang['admin']['run'] = 'Ejecutar';
$lang['admin']['run_udt'] = 'Ejecutar esta etiqueta definida por el usuario';
$lang['admin']['stylesheetcopied'] = 'Hoja de estilo copiada';
$lang['admin']['templatecopied'] = 'Plantilla copiada';
$lang['admin']['ecommerce_desc'] = 'Modulos que permiten el Comercio Electr&oacute;nico';
$lang['admin']['ecommerce'] = 'Comercio Electr&oacute;nico';
$lang['admin']['help_function_content_module'] = '<h3>&iquest;Esto que hace?</h3>
<p>This content block type allows interfacing with different modules to create different content block types.</p>
<p>Some modules can define content block types for use in module templates.  i.e: The FrontEndUsers module may define a group list content block type.  It will then indicate how you can use the content_module tag to utilize that block type within your templates.</p>
<p><strong>Note:</strong> This block type must be used only with compatible modules.  You should not use this in any way except for as guided by addon modules.</p>';
$lang['admin']['error_parsing_content_blocks'] = 'Ocurri&oacute; un error analizando los bloques de contenido (quiz&aacute;s por duplicidad de nombre)';
$lang['admin']['error_no_default_content_block'] = 'No ha sido detectado un bloque de contenido por defecto en esta plantilla. Por favor, asegurate que existe una etiqueta {content} en la plantilla.';
$lang['admin']['help_function_cms_stylesheet'] = '	<h3>&iquest;Esto que hace?</h3>
<p<Un reemplazo para la etiqueta {stylesheet}, esta etiqueta provee almacenamiento cach&eacute; para archivos css al generar archivos est&aacute;ticos en el directorio tmp/cache , y procesamiento smarty para hojas de estilo individuales</p>
<p>Este plugin recupera informaci&oacute;n de estilo del sistema. Por defecto, toma todas las hojas de estilo adjuntadas a la plantilla actual en el &oacute;rden especificado por el dise&ntilde;ador y genera etiquetas de hoja de estilo.</p> 
<p>Las hojas de estilo general tienen un nombre &uacute;nico de acuerdo a la fecha de ultima modificaci&oacute;n en la base de datos y solo son generadas cuando la hoja de estilo ha cambiado.</p>
<p>Esta etiqueta es el reemplazo para la etiqueta {stylesheet}.</p>
<h3>&iquest;Como se usa?</h3>
<p>Solo inserte  esta etiqueta en la plantilla de la p&aacute;gina dentro de la secci&oacute;n head como :<code>{cms_stylesheet}</code></p>
  <h3>&iquest;Que par&aacute;metros recibe?</h3>
  <ul>
  <li><em>(optional)</em>name - En vez de obtener todas las hojas de estilo para una p&aacute;gina dada, s&oacute;lo llamar&aacute; la especifiada, sin importar si este adjuntada o no a la plantilla actual</li>
  <li><em>(optional)</em>templateid - Si se defina la IDe de la plantilla, esta regresar&aacute; las hojas de estilo asociadas con esa plantila en vez de con la actual.</li>
  <li><em>(optional)</em>media - Cuando se usa en conjuinto on el par&aacute;metro name, este par&aacute;metro permitir&aacute; ignorar el tipo de medio especificado para dicha hoja de estilo. Cuando se use en conjunto con el par&aacute;metro templateid, el par&aacute;metro solo reflejar&aacute; las etiquetas de hoja de estilo para aquellas que est&eacute;n marcadas como compatibles para el tipo de medio especificado</li>
  </ul>
  <h3>Procesamiento Smarty</h3>
  <p>Cuando se generan archivos css este sistema pasa las hojas de estilo consultadas en la base de datos a trav&eacute;s de smarty. Los delimitadores smarty han cambiado del est&aacute;ndar anterior de cmsms{ y } a [[ y ]] respectivamente para facilitar la transici&oacute;n de las hojas de estilo..  This allows creating smarty variables i.e.: [[assign var=&#039;red&#039; value=&#039;#900&#039;]] at the top of the stylesheet, and then using these variables later in the stylesheet, i.e:</p>
<pre>
<code>
h3 .error { color: [[$red]]; }<br/>
</code>
</pre>
<p>Because the cached files are generated in the tmp/cache directory of the CMSMS installation, the CSS relative working directory is not the root of the website.  Therefore any images, or other tags that require a url should use the [[root_url]] tag to force it to be an absolute url. i.e:</p>
<pre>
<code>
h3 .error { background: url([[root_url]]/uploads/images/error_background.gif); }<br/>
</code>
</pre>
<p><strong>Note:</strong> Due to the caching nature of the plugin, smarty variables should be placed at the top of EACH stylesheet that is attached to a template.</p>';
$lang['admin']['pseudocron_granularity'] = 'Granularidad de Pseudocron ';
$lang['admin']['info_pseudocron_granularity'] = 'Este par&aacute;metro indica la peridiocidad con la que el sistema ejecutar&aacute; las tareas programadas';
$lang['admin']['cron_request'] = 'Cada petici&oacute;n';
$lang['admin']['cron_15m'] = '15 Minutos';
$lang['admin']['cron_30m'] = '30 Minutos';
$lang['admin']['cron_60m'] = '1 Hora';
$lang['admin']['cron_120m'] = '2 Horas';
$lang['admin']['cron_3h'] = '3 Horas';
$lang['admin']['cron_6h'] = '6 Horas';
$lang['admin']['cron_12h'] = '12 Horas';
$lang['admin']['cron_24h'] = '24 Horas';
$lang['admin']['adminlog_1day'] = '1 d&iacute;a';
$lang['admin']['adminlog_1week'] = '1 semana';
$lang['admin']['adminlog_2weeks'] = '2 semanas';
$lang['admin']['adminlog_1month'] = '1 mes';
$lang['admin']['adminlog_3months'] = '3 meses';
$lang['admin']['adminlog_6months'] = '6 meses';
$lang['admin']['adminlog_manual'] = 'Borrado manual';
$lang['admin']['adminlog_lifetime'] = 'Duraci&oacute;n de las entradas de log';
$lang['admin']['info_adminlog_lifetime'] = 'Eliminar las entradas de log anteriores al periodo especificado.';
$lang['admin']['filteruser'] = 'El nombre de usuario es';
$lang['admin']['filtername'] = 'El nombre de evento contiene';
$lang['admin']['filteraction'] = 'Acci&oacute;n contiene';
$lang['admin']['filterapply'] = 'Aplicar filtros';
$lang['admin']['filterreset'] = 'Restaurar filtros';
$lang['admin']['filters'] = 'Filtros';
$lang['admin']['showfilters'] = 'Mostrar filtros';
$lang['admin']['clearcache_taskdescription'] = 'Si se ejecuta diariamente, esta tarea limpiar&aacute; los archivos en cache que son mas antiguos que el tiempo presente en los ajustes generales.';
$lang['admin']['clearcache_taskname'] = 'Limpiar los ficheros de la cach&eacute;';
$lang['admin']['info_autoclearcache'] = 'Especificar un numero entero. Ingresar 0 para desabilitar la limpieza automatica del cache.';
$lang['admin']['autoclearcache'] = 'Automaticamente limpiar el cache cada N dias';
$lang['admin']['listtemplates_pagelimit'] = 'N&uacute;mero de lineas por pagina cuando se ve una plantilla';
$lang['admin']['liststylesheets_pagelimit'] = 'N&uacute;mero de lineas por p&aacute;gina cuando se ve una hoja de estilo';
$lang['admin']['listgcbs_pagelimit'] = 'N&uacute;mero de lineas por pagina cuando se ve un bloque de contenido global';
$lang['admin']['insecure'] = 'Inseguro (HTTP)';
$lang['admin']['secure'] = 'Seguro (HTTPS)';
$lang['admin']['secure_page'] = 'Usar HTTPS para esta p&aacute;gina';
$lang['admin']['thumbnail_width'] = 'Ancho de la miniatura';
$lang['admin']['thumbnail_height'] = 'Altura de la miniatura';
$lang['admin']['E_STRICT'] = 'Est&aacute; E_STRICT desabilitado en error_reporting (PHP)';
$lang['admin']['test_estrict_failed'] = 'E_STRICT est&aacute; habilitado en error_reporting (PHP)';
$lang['admin']['info_estrict_failed'] = 'Algunas librerias que CMSMS usa no funcionar&aacute;n bien con E_STRICT. Por favor desabilitelo.';
$lang['admin']['E_DEPRECATED'] = 'Est&aacute; E_DEPRECATED deshabilitado en error_reporting';
$lang['admin']['test_edeprecated_failed'] = 'E_DEPRECATED est&aacute; activo';
$lang['admin']['info_edeprecated_failed'] = 'If E_DEPRECATED is enabled in your error reporting users will see alot of warning messages that could effect the display and functionalty';
$lang['admin']['session_use_cookies'] = 'Las Sesiones pueden usar Cookies';
$lang['admin']['errorgettingcontent'] = 'No se pudo obtener informaci&oacute;n para el objeto de contenido especificado';
$lang['admin']['errordeletingcontent'] = 'Error al borrar el contenido (esta pagina tiene sub-paginas o es el contenido por defecto)';
$lang['admin']['invalidemail'] = 'La direci&oacute;n de email es inv&aacute;lida';
$lang['admin']['info_deletepages'] = 'Nota: Debido a restricciones de permisos, algunas de las paginas seleccionadas para ser borradas puede que no esten listadas abajo.';
$lang['admin']['info_pagealias'] = 'Especificar un alias unico para esta pagina.';
$lang['admin']['info_autoalias'] = 'Si este campo est&aacute; vacio, se generar&aacute; un alias automaticamente.';
$lang['admin']['invalidparent'] = 'Debe seleccionar una pagina parental (contacte a su administrador si no ve esta opcion).';
$lang['admin']['forgotpwprompt'] = 'Ingrese su nombre de usuario administrativo. Se enviar&aacute; un correo electronico con la nueva informaci&oacute;n de ingreso a la direcci&oacute;n asociada con dicho nombre de usuario.';
$lang['admin']['info_basic_attributes'] = 'Este campo permite especificar que propiedades del contenido pueden ser editadas por  usuarios que no poseen el permiso &quot;Modificar estructura de la pagina&quot;.';
$lang['admin']['basic_attributes'] = 'Propiedades basicas.';
$lang['admin']['no_permission'] = 'No tiene permiso para ejecutar esa funci&oacute;n.';
$lang['admin']['bulk_success'] = 'Operaci&oacute;n masiva has sido actualizada.';
$lang['admin']['no_bulk_performed'] = 'No se ejectu&oacute; ninguna operaci&oacute;n masiva.';
$lang['admin']['info_preview_notice'] = 'Advertencia: El panel de vista previa actua como una ventana de navegador permitiendo que navegue a otras paginas que no sean la pagina inicialmente mostrada. Sin embargo, si hace eso, puede ocurrir algun compartamiento inesperado. Si se navega a otras paginas y luego se regresa a la pagina inicial de vista previa, puede que no se muestren los cambios realizados. ';
$lang['admin']['sitedownexcludes'] = 'Excluir estas direcciones de los mensajes del Sitio Desactivado';
$lang['admin']['info_sitedownexcludes'] = 'Este parametro permite hacer una lista de direcciones de IP o redes que no deben ser sometidas al mecanismo de &quot;sitio de baja&quot;. Esto permite a los administradores trabajar en el sitio mientras visitantes anonimos ven el mensaje de &quot;sitio desactivado&quot;
<br/><br/>Las direcciones pueden ser especificadas en los siguientes formatos:<br/>
1. xxx.xxx.xxx.xxx -- (Direccion IP exacta)<br/>
2. xxx.xxx.xxx.[yyy-zzz] -- (rango de la direcci&oacute;n IP)<br/>
3. xxx.xxx.xxx.xxx/nn -- (nnn = numero de bits, estilo cisco.  i.e:  192.168.0.100/24 = entera 192.168.0 clase C sub-red)';
$lang['admin']['setup'] = 'Configuraci&oacute;n avanzada';
$lang['admin']['handle_404'] = 'Manejo de mensaje 404';
$lang['admin']['sitedown_settings'] = 'Ajustes de sitio de baja';
$lang['admin']['general_settings'] = 'Ajustes generales';
$lang['admin']['help_function_page_attr'] = '<h3>&iquest;Que hace este modulo?</h3>
<p>La llamada de este m&oacute;dulo regresa el valor de los atributos de cierta pagina.</p>
<h3>&iquest;Como se utiliza?</h3>
<p>Insertar la etiqueta dentro de la plantilla asi: <code>{page_attr key=&quot;extra1&quot;}</code>.</p>
<h3>&iquest;Que par&aacute;metros son v&aacute;lidos?</h3>
<ul>
  <li><strong>key [required]</strong> El atributo de la llave a regresar.</li>
</ul>';
$lang['admin']['forge'] = 'Forge ';
$lang['admin']['disable_wysiwyg'] = 'Desabilitar editor WYSIWYG en esta pagina (sin importar los ajustes de la plantilla o del usuario)';
$lang['admin']['help_function_page_image'] = '<h3>&iquest;Que hace este m&oacute;dulo?</h3>
<p>Esta etiqueta (tag) puede ser usada para devolver el valor de la imagen o la vista miniatura de cierta pagina.</p>
<h3>&iquest;Como se usa?</h3>
<p>Insertar la etiqueta en la plantilla asi:<code>{page_image}</code>.</p>
<h3>&iquest;Que par&aacute;metros son v&aacute;lidos?</h3>
<ul>
  <li>thumbnail - Opcionalmente despliega el valor de la vista miniatura en vez de la propiedad &quot;imagen&quot;.</li>
</ul>';
$lang['admin']['pagelink_circular'] = 'Un enlace a una pagina no puede listar otro enlace como destino';
$lang['admin']['destinationnotfound'] = 'La pagina seleccionada no fue hallada o es inv&aacute;lida';
$lang['admin']['help_function_dump'] = '<h3>&iquest;Que hace esto?</h3>
  <p>La llamada de este modulo puede usarse para vertir el contenido de cualquier variable smarty en un formato mas legible. Esto es util para depurar y editar plantillas, para saber el formato y tupos de una variable de datos.</p>
<h3>&iquest;Como se usa?</h3>
<p>En la plantilla, insertar la etiqueta asi:<code>{dump item=&#039;the_smarty_variable_to_dump&#039;}</code>.</p>
<h3>&iquest;Que parametros acepta?</h3>
<ul>
<li><strong>item (requerido)</strong> - La variable de Smarty de la que se verter&aacute; el contenido.</li>
<li>maxlevel - El n&uacute;mero maximo de niveles de alcance recursivo (solo aplica si la recursi&oacute;n es tambien suplida. El valor por defecto de este parametro es 3</li>
<li>nomethods - Omitir resultados de metodos de objetos.</li>
<li>novars - Omitir resultados de miembros de objetos.</li>
<li>recurse - Ejecutar recursividad al numero m&aacute;ximo de niveles a traves de los objetos, proporcionando resultados visibles para cada item hasta que el n&uacute;mero m&aacute;ximo de niveles es alcanzado.</li>
</ul>';
$lang['admin']['sqlerror'] = 'Error SQL en %s';
$lang['admin']['image'] = 'Imagen';
$lang['admin']['thumbnail'] = 'Imagen Miniatura';
$lang['admin']['searchable'] = 'Esta pagina es &quot;buscable&quot;';
$lang['admin']['help_function_content_image'] = '<h3>Needs Translation</h3>
<h3>&iquest;Esto que hace?</h3>
<p>This plugin allows template designers to prompt users to select an image file when editing the content of a page. It behaves similarly to the content plugin, for additional content blocks.</p>
<h3>&iquest;Como se usa?</h3>
<p>Just insert the tag into your page template like: <code>{content_image block=&#039;image1&#039;}</code>.</p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<ul>
  <li><strong>(required)</strong> block - The name for this additional content block.
  <p>Example:</p>
  <pre>{content_image block=&#039;image1&#039;}</pre><br/>
  </li>

  <li><em>(optional)</em> label - A label or prompt for this content block in the edit content page.  If not specified, the block name will be used.</li>
 
  <li><em>(optional)</em> dir - The name of a directory (relative to the uploads directory, from which to select image files. If not specified, the uploads directory will be used.
  <p>Example: use images from the uploads/image directory.</p>
  <pre>{content_image block=&#039;image1&#039; dir=&#039;images&#039;}</pre><br/>
  </li>

  <li><em>(optional)</em> class - The css class name to use on the img tag in frontend display.</li>

  <li><em>(optional)</em> id - The id name to use on the img tag in frontend display.</li> 

  <li><em>(optional)</em> name - The tag name to use on the img tag in frontend display.</li> 

  <li><em>(optional)</em> width - The desired width of the image.</li>

  <li><em>(optional)</em> height - The desired height of the image.</li>

  <li><em>(optional)</em> alt - Alternative text if the image cannot be found.</li>


</ul>';
$lang['admin']['error_udt_name_chars'] = 'Nombres v&aacute;lidos son los que empiezan con una letra o un simbolo de subrayado, seguido por letras, numeros o sub-rayas.';
$lang['admin']['errorupdatetemplateallpages'] = 'La plantilla no est&aacute; activa';
$lang['admin']['hidefrommenu'] = 'Ocultar del Men&uacute;';
$lang['admin']['settemplate'] = 'Establecer Plantilla';
$lang['admin']['text_settemplate'] = 'Establecer diferente Plantilla a las P&aacute;ginas seleccionadas';
$lang['admin']['cachable'] = 'Cacheable';
$lang['admin']['noncachable'] = 'No Cacheable';
$lang['admin']['copy_from'] = 'Copiar Desde';
$lang['admin']['copy_to'] = 'Copiar A';
$lang['admin']['copycontent'] = 'Copiar Contenido del Elemento';
$lang['admin']['md5_function'] = 'funci&oacute;n md5';
$lang['admin']['tempnam_function'] = 'funcion tempnam';
$lang['admin']['register_globals'] = 'PHP register_globals ';
$lang['admin']['output_buffering'] = 'PHP output_buffering ';
$lang['admin']['disable_functions'] = 'disable_functions in PHP ';
$lang['admin']['xml_function'] = 'Soporte B&aacute;sico XML (expat)';
$lang['admin']['magic_quotes_gpc'] = 'Comillas Magicas (Magic quotes) para Get/Post/Cookie';
$lang['admin']['magic_quotes_gpc_on'] = 'Comilla simple, dobles comillas y barra invertida son &quot;escpadas&quot; autom&aacute;ticamente. Puede que tengas problemas al guardar plantillas.';
$lang['admin']['magic_quotes_runtime'] = 'Comillas magicas en tiempo de ejecuci&oacute;n (runtime)';
$lang['admin']['magic_quotes_runtime_on'] = 'La mayoria de las funciones que devuelven informaci&oacute;n tienen las comillas &quot;escapadas&quot; con barra invertida. Puedes tener problemas.';
$lang['admin']['file_get_contents'] = 'Test file_get_contents ';
$lang['admin']['check_ini_set'] = 'Test ini_set ';
$lang['admin']['check_ini_set_off'] = 'Puede que tengas dificultades con algunas funcionalidades sin esta capacidad. Este test puede fallar si el safe_mode esta activado.';
$lang['admin']['file_uploads'] = 'Archivos subidos';
$lang['admin']['test_remote_url'] = 'Testear para URL remota';
$lang['admin']['test_remote_url_failed'] = 'Probablemente no podr&aacute;s abrir un archivo en un servidor web remoto.';
$lang['admin']['test_allow_url_fopen_failed'] = 'Cuando &#039;Permitir <em>fopen</em> para urls&#039; esta desabilitado, no se podr&aacute; accesar el objeto URL como archivo usando los protocolos ftp o http.';
$lang['admin']['connection_error'] = 'Connexiones http salientes parecen no funcionar! &iquest;Existe algun firewall o ACL para conexiones externas?. Esto puede causar que el Administrador de Modulos u otras funcionalidades fallen.';
$lang['admin']['remote_connection_timeout'] = 'Se perdi&oacute; la conexi&oacute;n!';
$lang['admin']['search_string_find'] = 'Conexi&oacute;n buena!';
$lang['admin']['connection_failed'] = 'Conexi&oacute;n fallida!';
$lang['admin']['remote_response_ok'] = 'Respuesta remota: ok!';
$lang['admin']['remote_response_404'] = 'Respuesta remota: no se encontr&oacute;!';
$lang['admin']['remote_response_error'] = 'Respuesta remota: error!';
$lang['admin']['notifications_to_handle'] = 'Tienes <b>%d</b> notificaciones sin controlar';
$lang['admin']['notification_to_handle'] = 'Tienes <b>%d</b> notificaci&oacute;n sin controlar';
$lang['admin']['notifications'] = 'Notificaciones';
$lang['admin']['dashboard'] = 'Ver tablero de controles';
$lang['admin']['ignorenotificationsfrommodules'] = 'Ignorar las notificaciones de estos m&oacute;dulos';
$lang['admin']['admin_enablenotifications'] = 'Permitir a los usuarios ver notificaciones<br/><em>(las notificaciones estaran disponibles en todas las p&aacute;ginas de administraci&oacute;n)</em>';
$lang['admin']['enablenotifications'] = 'Permitir las notificaciones de usuario en la secci&oacute;n de administraci&oacute;n';
$lang['admin']['test_check_open_basedir_failed'] = 'Restricciones de &quot;open basedir&quot; esta activas. Puede que tenga dificultad con alguna funcionalidad de algun &quot;addon&quot;.';
$lang['admin']['config_writable'] = 'config.php con permisos de escritura. Es m&aacute;s seguro cambiar los permisos a s&oacute;lo lectura';
$lang['admin']['caution'] = 'Precauci&oacute;n';
$lang['admin']['create_dir_and_file'] = 'Comprobar si el proceso httpd puede crear un archivo dentro de un directorio creado';
$lang['admin']['os_session_save_path'] = 'Sin chequeo debido a la ruta de Sistema Operativo';
$lang['admin']['unlimited'] = 'Ilimitado';
$lang['admin']['open_basedir'] = 'Abrir Directirio base PHP (Open Basedir)';
$lang['admin']['open_basedir_active'] = 'No check because open basedir activ';
$lang['admin']['invalid'] = 'Inv&aacute;lido';
$lang['admin']['checksum_passed'] = 'Todos los checksum coinciden con los del archivo subido';
$lang['admin']['error_retrieving_file_list'] = 'Error al cargar el listado de archivos';
$lang['admin']['files_checksum_failed'] = 'Los archivos no han podido ser chequeados (checksum)';
$lang['admin']['failure'] = 'Fallo';
$lang['admin']['help_function_process_pagedata'] = '<h3>Needs Translation</h3>
<h3>&iquest;Esto que hace?</h3>
<p>This plugin will process the data in the &quot;pagedata&quot; block of content pages through smarty.  It allows you to specify page specific data to smarty without changing the template for each page.</p>
<h3>&iquest;Como se usa?</h3>
<ol>
  <li>Insert smarty assign variables and other smarty logic into the pagedata field of some of your content pages.</li>
  <li>Insert the <code>{process_pagedata}</code> tag into the very top of your page template.</li>
</ol>
<br/>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<p>None at this time</p>';
$lang['admin']['page_metadata'] = 'Metadata Espec&iacute;fica de la p&aacute;gina';
$lang['admin']['pagedata_codeblock'] = 'L&oacute;gica o informaci&oacute;n de Smarty espec&iacute;fica a esta p&aacute;gina';
$lang['admin']['error_uploadproblem'] = 'Ocurri&oacute; un error al enviar';
$lang['admin']['error_nofileuploaded'] = 'Ning&uacute;n archivo fue enviado';
$lang['admin']['files_failed'] = 'Los archivos fallaron el chequeo de md5sum';
$lang['admin']['files_not_found'] = 'No se encontraron los archivos';
$lang['admin']['info_generate_cksum_file'] = 'Esta funci&oacute;n te permitir&aacute; generar un archivo con el checksum y guardarlo en tu ordenador para comprobaciones posteriores. Deber&iacute;a ser ejecutado justamente antes de implantar la p&aacute;gina web y/o despu&eacute;s de cualquier actualizaci&oacute;n o modificaci&oacute;n.';
$lang['admin']['info_validation'] = 'Esta funci&oacute;n comparar&aacute; los checksum encontrados en los archivos subidos con los archivos de la instalaci&oacute;n actual. Podr&iacute;a ser de ayuda para encontrar problemas con la subida de archivos, o exactamente los archivos que han sido modificados si su sistema ha sido hackeado/comprometido. Un archivo checksum para cada release de CMSMS desde la version 1.4.';
$lang['admin']['download_cksum_file'] = 'Descargar archivo Checksum';
$lang['admin']['perform_validation'] = 'Realizar validaci&oacute;n';
$lang['admin']['upload_cksum_file'] = 'Enviar archivo Checksum';
$lang['admin']['checksumdescription'] = 'Validar la integridad de los archivos de CMS comparando con los Checksums conocidos';
$lang['admin']['system_verification'] = 'Verificaci&oacute;n de Sistema';
$lang['admin']['extra1'] = 'Atributo de P&aacute;gina Extra 1';
$lang['admin']['extra2'] = 'Atributo de P&aacute;gina Extra 2';
$lang['admin']['extra3'] = 'Atributo de P&aacute;gina Extra 3';
$lang['admin']['start_upgrade_process'] = 'Empezar el proceso de actualizaci&oacute;n';
$lang['admin']['warning_upgrade'] = '<em><strong>Cuidado:</strong></em> CMSMS necesita actualizarse.';
$lang['admin']['warning_upgrade_info1'] = 'Esta utilizando el esquema versi&oacute;n %s. necesita actualizar a la versi&oacute;n %s';
$lang['admin']['warning_upgrade_info2'] = 'Por favor, haga click en el siguiente link: %s.';
$lang['admin']['warning_mail_settings'] = 'Sus configuraciones de email no han sido efectuadas. Esto podr&iacute;a interferir con la capacidad de su sitio web para enviar mensajes via email. Deber&iacute;a ir a <a href="moduleinterface.php?module=CMSMailer">Extensions >> CMSMailer</a> y configurar los par&aacute;metros de correo con la informaci&oacute;n brindada por su host.';
$lang['admin']['view_page'] = 'Ver esta p&aacute;gina en una ventana nueva';
$lang['admin']['off'] = 'Apagado';
$lang['admin']['on'] = 'Encendido';
$lang['admin']['invalid_test'] = 'Parametro de prueba inv&aacute;lido!';
$lang['admin']['copy_paste_forum'] = 'Ver Informe de Texto <em>(adecuado para copiar en foros)</em>';
$lang['admin']['permission_information'] = 'Informaci&oacute;n de Permisos';
$lang['admin']['server_os'] = 'Sistema Operatido del Servidor';
$lang['admin']['server_api'] = 'API del Servidor';
$lang['admin']['server_software'] = 'Software del Servidor';
$lang['admin']['server_information'] = 'Informaci&oacute;n del Servidor';
$lang['admin']['session_save_path'] = 'Sendero para guardar la sesi&oacute;n';
$lang['admin']['max_execution_time'] = 'Tiempo M&aacute;ximo de Ejecuci&oacute;n';
$lang['admin']['gd_version'] = 'Versi&oacute;n GD';
$lang['admin']['upload_max_filesize'] = 'Tama&ntilde;o M&aacute;ximo para Subir (Uploads)';
$lang['admin']['post_max_size'] = 'Tama&ntilde;o M&aacute;ximo para Posts';
$lang['admin']['memory_limit'] = 'Limite Efectivo de Memoria PHP';
$lang['admin']['server_db_type'] = 'Base de Datos del Servidor';
$lang['admin']['server_db_version'] = 'Versi&oacute;n de Base de Datos del Servidor';
$lang['admin']['phpversion'] = 'Versi&oacute;n actual de PHP';
$lang['admin']['safe_mode'] = 'Modo Seguro PHP';
$lang['admin']['php_information'] = 'Informaci&oacute;n PHP';
$lang['admin']['cms_install_information'] = 'Informaci&oacute;n de Instalaci&oacute;n CMS';
$lang['admin']['cms_version'] = 'Versi&oacute;n CMS';
$lang['admin']['installed_modules'] = 'Modulos Instalados';
$lang['admin']['config_information'] = 'Informaci&oacute;n de Configuraci&oacute;n';
$lang['admin']['systeminfo_copy_paste'] = 'Por favor copie y pegue el texto marcado en su mensaje del foro';
$lang['admin']['help_systeminformation'] = 'La informaci&oacute;n que se ense&ntilde;a aqu&iacute; abajo ha sido recogida de varios sitios, a sido resumida para facilitarte encontrar informaci&oacute;n requerida para diagnosticar el problema o pedir ayuda con tu instalaci&oacute;n de CMSMS.';
$lang['admin']['systeminfo'] = 'Informaci&oacute;n de Sistema';
$lang['admin']['systeminfodescription'] = 'Ense&ntilde;ar informaci&oacute;n de su sistema que puede ser &uacute;til al diagnosticar problemas';
$lang['admin']['systemmaintenance'] = 'Mantenimiento de Sistema';
$lang['admin']['systemmaintenancedescription'] = 'Various functions for maintaining the health of your system. You can also browse the changelog for all releases.';
$lang['admin']['sysmaintab_database'] = 'Base de datos';
$lang['admin']['sysmaintab_changelog'] = 'Registro de cambios';
$lang['admin']['sysmaintab_content'] = 'Cache y contenido';
$lang['admin']['sysmain_content_status'] = 'Estatus del contenido';
$lang['admin']['sysmain_cache_status'] = 'Estatus del cache';
$lang['admin']['sysmain_database_status'] = 'Estatus de la base de datos';
$lang['admin']['sysmain_updatehierarchy'] = 'Actualizar posiciones de jerarqu&iacute;a de la pagina';
$lang['admin']['sysmain_confirmupdatehierarchy'] = '&iquest;Esta seguro de querer actualizar las posiciones de jerarqu&iacute;a de la pagina?';
$lang['admin']['sysmain_update'] = 'Actualizar';
$lang['admin']['sysmain_pagesfound'] = 'paginas encontradas';
$lang['admin']['sysmain_hierarchyupdated'] = 'Posiciones de jerarqu&iacute;a de la pagina actualizadas';
$lang['admin']['sysmain_nostr_errors'] = 'No se detectaro errores estructurales en la base de datos';
$lang['admin']['sysmain_str_error'] = 'Error estructural encontrados en la tabla';
$lang['admin']['sysmain_str_errors'] = 'Errores estructurales encontrados en las tablas';
$lang['admin']['sysmain_tablesfound'] = 'tablas encontradas (de las cuales %d no son seq-tables)';
$lang['admin']['sysmain_repair'] = 'Reparar';
$lang['admin']['sysmain_repairtables'] = 'Reparar tablas';
$lang['admin']['sysmain_tablesrepaired'] = 'Tablas reparadas';
$lang['admin']['sysmain_optimizetables'] = 'Optimizar tablas';
$lang['admin']['sysmain_tablesoptimized'] = 'Tablas optimizadas';
$lang['admin']['sysmain_optimize'] = 'Optimizar';
$lang['admin']['sysmain_confirmclearcache'] = '&iquest;Est&aacute; seguro de querer limpiar el cache?';
$lang['admin']['sysmain_nocontenterrors'] = 'No se encontraron errores de contenido';
$lang['admin']['sysmain_pagesmissinalias'] = 'p&aacute;ginas carecen de alias';
$lang['admin']['sysmain_confirmfixaliases'] = '&iquest;Est&aacute; seguro que quiere agregar alias a las p&aacute;ginas que no lo tienen?';
$lang['admin']['sysmain_fixaliases'] = 'Add aliases where missed';
$lang['admin']['sysmain_aliasesfixed'] = 'alias arreglado';
$lang['admin']['sysmain_pagesinvalidtypes'] = 'p&aacute;ginas con tipo de contenido inv&aacute;lido';
$lang['admin']['sysmain_confirmfixtypes'] = '&iquest;Est&aacute; seguro de querer convertir todas las p&aacute;ginas con contenido inv&aacute;lido a p&aacute;ginas de contenido est&aacute;ndar??';
$lang['admin']['sysmain_fixtypes'] = 'Convertir a p&aacute;ginas de contenido est&aacute;ndar';
$lang['admin']['sysmain_typesfixed'] = 'page content types fixed';
$lang['admin']['welcome_user'] = 'Bienvenido';
$lang['admin']['itsbeensincelogin'] = 'Han pasado %s desde su &uacute;ltimo login';
$lang['admin']['days'] = 'd&iacute;as';
$lang['admin']['day'] = 'd&iacute;a';
$lang['admin']['hours'] = 'horas';
$lang['admin']['hour'] = 'hora';
$lang['admin']['minutes'] = 'minutos';
$lang['admin']['minute'] = 'minuto';
$lang['admin']['help_css_max_age'] = 'Este par&aacute;metro deber&iacute;a ser relativamente alto para sitios est&aacute;ticos, y deber&iacute;a ser 0 para sitios en construcci&oacute;n';
$lang['admin']['css_max_age'] = 'Tiempo maximo que las hojas de estilo (stylesheets) seran cacheadas en el navegador';
$lang['admin']['error'] = 'Error ';
$lang['admin']['new_version_available'] = '<em>Aviso:</em> Una nueva versi&oacute;n de CMS Made Simple est&aacute; disponible. Por favor notifique a su administrador.';
$lang['admin']['master_admintheme'] = 'Tema Administrativo por defectp (para la pagina de login y de nuevos usuarios)';
$lang['admin']['contenttype_separator'] = 'Separador';
$lang['admin']['contenttype_sectionheader'] = 'Encabezado de Secci&oacute;n';
$lang['admin']['contenttype_content'] = 'Contenido';
$lang['admin']['contenttype_pagelink'] = 'Enlace de Pagina Interna';
$lang['admin']['nogcbwysiwyg'] = 'Deshabilitar editores WYSIWYG en bloques de contenido global';
$lang['admin']['destination_page'] = 'Pagina Destino';
$lang['admin']['additional_params'] = 'Parametros Adicionales';
$lang['admin']['help_function_current_date'] = '	<h3>&iquest;Que hace esto?</h3>
	<p>Imprime la hora y fecha actuales. Si no se especifica un formato, por defecto usar&aacute; el formato similar a: &#039;Jan 01, 2004&#039;.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Inserte la etiqueta en su plantilla asi:<code>{current_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
	<h3>&iquest;Que parametros acepta?</h3>
	<ul>
		<li><em>(opcional)</em>format - Formato de Fecha/Hora, usando parametros de la funci&oacute;n de PHP. Vea <a href="http://php.net/strftime" target="_blank">aqui</a> para una lista de parametros e informaci&oacute;n.</li>
		<li><em>(opcional)</em>ucword - Si es &quot;true&quot; devuelve la may&uacute;scula de la primera letra de cada palabra.</li>
	</ul>
	</p>';
$lang['admin']['help_function_valid_xhtml'] = '<h3>&iquest;Esto que hace?</h3>
<p>Devuelve un enlace a el validador HTML de w3c.</p>
<h3>&iquest;Como se usa?</h3>
<p>Solo inserte esta etiqueta en su plantilla/p&aacute;gina como por ejemplo: <code>{valid_html}</code></p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
    <ul>
	<li><em>(optional)</em> url         (string)     - The URL used for validation, if none is given http://validator.w3.org/check/referer is used.</li>
	<li><em>(optional)</em> class       (string)     - If set, this will be used as class attribute for the link (a) element</li>
	<li><em>(optional)</em> target      (string)     - If set, this will be used as target attribute for the link (a) element</li>
	<li><em>(optional)</em> image       (true/false) - If set to false, a text link will be used instead of an image/icon.</li>
	<li><em>(optional)</em> text        (string)     - If set, this will be used for the link text or alternate text for the image. Default is &#039;valid XHTML 1.0 Transitional&#039;.<br /> When an image is used, the given string will also be used for the image alt attribute (by default, this can be overridden by using the &#039;alt&#039; parameter).</li>
	<li><em>(optional)</em> image_class (string)     - Only if &#039;image&#039; is not set to false. If set, this will be used as class attribute for the image (img) element</li>
	<li><em>(optional)</em> src         (string)     - Only if &#039;image&#039; is not set to false. The icon to show. Default is http://www.w3.org/Icons/valid-xhtml10</li>
	<li><em>(optional)</em> width       (string)     - Only if &#039;image&#039; is not set to false. The image width. Default is 88 (width of http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(optional)</em> height      (string)     - Only if &#039;image&#039; is not set to false. The image height. Default is 31 (height of http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(optional)</em> alt         (string)     - Only if &#039;image&#039; is not set to false. The alternate text (&#039;alt&#039; attribute) for the image (element). If none is given the link text will be used.</li>
    </ul>
</p>';
$lang['admin']['help_function_valid_css'] = '<h3>&iquest;Esto que hace?</h3>
<p>Returns a link to the w3c CSS validator.</p>
<h3>&iquest;Como se usa?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_css}</code></p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<p>
    <ul>
        <li><em>(optional)</em> url         (string)     - The URL used for validation, if none is given http://jigsaw.w3.org/css-validator/check/referer is used.</li>
	<li><em>(optional)</em> class       (string)     - If set, this will be used as class attribute for the link (a) element</li>
	<li><em>(optional)</em> target      (string)     - If set, this will be used as target attribute for the link (a) element</li>
	<li><em>(optional)</em> image       (true/false) - If set to false, a text link will be used instead of an image/icon.</li>
	<li><em>(optional)</em> text        (string)     - If set, this will be used for the link text or alternate text for the image. Default is &#039;Valid CSS 2.1&#039;.<br /> When an image is used, the given string will also be used for the image alt attribute (by default, this can be overridden by using the &#039;alt&#039; parameter).</li>
	<li><em>(optional)</em> image_class (string)     - Only if &#039;image&#039; is not set to false. If set, this will be used as class attribute for the image (img) element</li>
        <li><em>(optional)</em> src         (string)     - Only if &#039;image&#039; is not set to false. The icon to show. Default is http://jigsaw.w3.org/css-validator/images/vcss</li>
        <li><em>(optional)</em> width       (string)     - Only if &#039;image&#039; is not set to false. The image width. Default is 88 (width of http://jigsaw.w3.org/css-validator/images/vcss)</li>
        <li><em>(optional)</em> height      (string)     - Only if &#039;image&#039; is not set to false. The image height. Default is 31 (height of http://jigsaw.w3.org/css-validator/images/vcss)</li>
	<li><em>(optional)</em> alt         (string)     - Only if &#039;image&#039; is not set to false. The alternate text (&#039;alt&#039; attribute) for the image (element). If none is given the link text will be used.</li>
    </ul>
</p>';
$lang['admin']['help_function_title'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Imprime el t&iacute;tulo de la p&aacute;gina.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Solo inserte la etiqueta en su plantilla/p&aacute;gina asi:: <code>{title}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p><em>(optional)</em> assign (string) - Asigna los resultados a la variable smarty nombrada.</p>';
$lang['admin']['help_function_stylesheet'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Gets stylesheet information from the system.  By default, it grabs all of the stylesheets attached to the current template.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page&#039;s head section like: <code>{stylesheet}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
		<li><em>(optional)</em>name - Instead of getting all stylesheets for the given page, it will only get one spefically named one, whether it&#039;s attached to the current template or not.</li>
		<li><em>(optional)</em>media - If name is defined, this allows you set a different media type for that stylesheet.</li>
	</ul>
	</p>';
$lang['admin']['help_function_sitename'] = '        <h3>&iquest;Esto que hace?</h3>
        <p>Shows the name of the site.  This is defined during install and can bbe modified in the Global Settings section of the admin panel.</p>
        <h3>&iquest;Como se usa?</h3>
        <p>Just insert the tag into your template/page like: <code>{sitename}</code></p>
        <h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_search'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=Search">Search module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Search&#039;}</code> you can now just use <code>{search}</code> to insert the module in a template.
	</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just put <code>{search}</code> in a template where you want the search input box to appear. For help about the Search module, please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=Search">Search module help</a>.';
$lang['admin']['help_function_root_url'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Prints the root url location for the site.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{root_url}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_repeat'] = '  <h3>&iquest;Esto que hace?</h3>
  <p>Repeats a specified sequence of characters, a specified number of times</p>
  <h3>&iquest;Como se usa?</h3>
  <p>Insert a tag similar to the following into your template/page, like this: <code>{repeat string=&#039;repeat this &#039; times=&#039;3&#039;}</code>
  <h3>&iquest;Que par&aacute;metros recibe?</h3>
  <ul>
  <li>string=&#039;text&#039; - The string to repeat</li>
  <li>times=&#039;num&#039; - The number of times to repeat it.</li>
  </ul>';
$lang['admin']['help_function_recently_updated'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Outputs a list of recently updated pages.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{recently_updated}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
											 <li><p><em>(optional)</em> number=&#039;10&#039; - Number of updated pages to show.</p><p>Example: <pre>{recently_updated number=&#039;15&#039;}</pre></p></li>
											 	<li><p><em>(optional)</em> leadin=&#039;Last changed&#039; - Text to show left of the modified date.</p><p>Example: <pre>{recently_updated leadin=&#039;Last Changed&#039;}</pre></p></li>
											 	<li><p><em>(optional)</em> showtitle=&#039;true&#039; - Shows the titleattribute if it exists as well (true|false).</p><p>Example: <pre>{recently_updated showtitle=&#039;true&#039;}</pre></p></li>											 	
											 	<li><p><em>(optional)</em> css_class=&#039;some_name&#039; - Warp a div tag with this class around the list.</p><p>Example: <pre>{recently_updated css_class=&#039;some_name&#039;}</pre></p></li>											 	
											 		<li><p><em>(optional)</em> dateformat=&#039;d.m.y h:m&#039; - default is d.m.y h:m , use the format you whish (php -date- format)</p><p>Example: <pre>{recently_updated dateformat=&#039;D M j G:i:s T Y&#039;}</pre></p></li>											 	
	</ul>
	<p>or combined:</p>
	<pre>{recently_updated number=&#039;15&#039; showtitle=&#039;false&#039; leadin=&#039;Last Change: &#039; css_class=&#039;my_changes&#039; dateformat=&#039;D M j G:i:s T Y&#039;}</pre>';
$lang['admin']['help_function_print'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=Printing">Printing module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Printing&#039;}</code> you can now just use <code>{print}</code> to insert the module on pages and templates.
	</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just put <code>{print}</code> on a page or in a template. For help about the Printing module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=Printing">Printing module help</a>.';
$lang['admin']['login_info_title'] = 'Informacion';
$lang['admin']['login_info'] = 'A partir de aqui se deben tomar en consideraci&oacute;n los siguientes parametros';
$lang['admin']['login_info_params'] = '<ol> 
  <li>Cookies enabled in your browser</li> 
  <li>Javascript enabled in your browser </li> 
  <li>Windows popup active to the following address:</li> 
</ol>';
$lang['admin']['help_function_news'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=News">News module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;News&#039;}</code> you can now just use <code>{news}</code> to insert the module on pages and templates.
	</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just put <code>{news}</code> on a page or in a template. For help about the News module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=News">News module help</a>.';
$lang['admin']['help_function_modified_date'] = '        <h3>&iquest;Esto que hace?</h3>
        <p>Prints the date and time the page was last modified.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>&iquest;Como se usa?</h3>
        <p>Just insert the tag into your template/page like: <code>{modified_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>&iquest;Que par&aacute;metros recibe?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
        </ul>';
$lang['admin']['help_function_metadata'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Displays the metadata for this page. Both global metdata from the global settings page and metadata for each page will be shown.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template like: <code>{metadata}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
		<li><em>(optional)</em>showbase (true/false) - If set to false, the base tag will not be sent to the browser.  Defaults to true if use_hierarchy is set to true in config.php.</li>
	</ul>';
$lang['admin']['help_function_menu_text'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Prints the menu text of the page.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{menu_text}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_menu'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;MenuManager&#039;}</code> you can now just use <code>{menu}</code> to insert the module on pages and templates.
	</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just put <code>{menu}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module help</a>.';
$lang['admin']['help_function_last_modified_by'] = '        <h3>&iquest;Esto que hace?</h3>
        <p>Prints last person that edited this page.  If no format is given, it will default to a ID number of user .</p>
        <h3>&iquest;Como se usa?</h3>
        <p>Just insert the tag into your template/page like: <code>{last_modified_by format=&quot;fullname&quot;}</code></p>
        <h3>&iquest;Que par&aacute;metros recibe?</h3>
        <ul>
                <li><em>(optional)</em>format - id, username, fullname</li>
        </ul>';
$lang['admin']['help_function_image'] = '  <h3>&iquest;Esto que hace?</h3>
  <p>Creates an image tag to an image stored within your images directory</p>
  <h3>&iquest;Como se usa?</h3>
  <p>Just insert the tag into your template/page like: <code>{image src=&quot;something.jpg&quot;}</code></p>
  <h3>&iquest;Que par&aacute;metros recibe?</h3>
  <ul>
     <li><em>(required)</em>  <tt>src</tt> - Image filename within your images directory.</li>
     <li><em>(optional)</em>  <tt>width</tt> - Width of the image within the page. Defaults to true size.</li>
     <li><em>(optional)</em>  <tt>height</tt> - Height of the image within the page. Defaults to true size.</li>
     <li><em>(optional)</em>  <tt>alt</tt> - Alt text for the image -- needed for xhtml compliance. Defaults to filename.</li>
     <li><em>(optional)</em>  <tt>class</tt> - CSS class for the image.</li>
     <li><em>(optional)</em>  <tt>title</tt> - Mouse over text for the image. Defaults to Alt text.</li>
     <li><em>(optional)</em>  <tt>addtext</tt> - Additional text to put into the tag</li>
  </ul>';
$lang['admin']['help_function_html_blob'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>See the help for global_content for a description.</p>';
$lang['admin']['help_function_google_search'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Search&#039;s your website using Google&#039;s search engine.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{google_search}</code><br>
	<br>
	Note: Google needs to have your website indexed for this to work. You can submit your website to google <a href="http://www.google.com/addurl.html">here</a>.</p>
	<h3>What if I want to change the look of the textbox or button?</h3>
	<p>The look of the textbox and button can be changed via css. The textbox is given an id of textSearch and the button is given an id of buttonSearch.</p>

	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
		<li><em>(optional)</em> domain - This tells google the website domain to search. This script tries to determine this automatically.</li>
		<li><em>(optional)</em> buttonText - The text you want to display on the search button. The default is &quot;Search Site&quot;.</li>
	</ul>
	</p>';
$lang['admin']['help_function_global_content'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Inserts a global content block into your template or page.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{global_content name=&#039;myblob&#039;}</code>, where name is the name given to the block when it was created.</p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
		<li>name - The name of the global content block to display.</li>
	</ul>';
$lang['admin']['help_function_get_template_vars'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Dumps all the known smarty variables into your page</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{get_template_vars}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
											  <p>None at this time</p>';
$lang['admin']['help_function_uploads_url'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Prints the uploads url location for the site.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{uploads_url}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_embed'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Enable inclusion (embeding) of any other application into the CMS. The most usual use could be a forum. 
	This implementation is using IFRAMES so older browsers can have problems. Sorry bu this is the only known way 
	that works without modifing the embeded application.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{embed url=http://www.google.com/}</code><br></p>
        <h4>Example to make the iframe larger</h4>
	<p>Add the following to your style sheet:</p>
        <pre>#myframe { height: 600px; }</pre>
        <h3>&iquest;Que par&aacute;metros recibe?</h3>
        <ul>
               <li><em>(required)</em>url - the url to be included 
               <li><em>(optional)</em>header=true - this will generate the header code for good resizing of the IFRAME.</li>

        </ul>
       <p>You must include in your page content {embed url=..} and in the &quot;Metadata:&quot; section (advanced tab) you must put {embed header=true}. Also be sure to put this in between the &quot;head&quot; tags of your template: {metadata}</p>';
$lang['admin']['help_function_description'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Prints the description (title attribute) of the page.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{description}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_created_date'] = '        <h3>&iquest;Esto que hace?</h3>
        <p>Prints the date and time the page was created.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>&iquest;Como se usa?</h3>
        <p>Just insert the tag into your template/page like: <code>{created_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>&iquest;Que par&aacute;metros recibe?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
        </ul>';
$lang['admin']['help_function_content'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This is where the content for your page will be displayed.  It&#039;s inserted into the template and changed based on the current page being displayed.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template like: <code>{content}</code>.</p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
		<li><em>(optional)</em>block - Allows you to have more than one content block per page.  When multiple content tags are put on a template, that number of edit boxes will be displayed when the page is edited.
<p>Example:</p>
<pre>{content block=&quot;Second Content Block&quot;}</pre>
<p>Now, when you edit a page there will a textarea called &quot;Second Content Block&quot;.</li>
		<li><em>(optional)</em>wysiwyg (true/false) - If set to false, then a wysiwyg will never be used while editing this block.  If true, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>oneline (true/false) - If set to true, then only one edit line will be shown while editing this block.  If false, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>assign - Assigns the content to a smarty parameter, which you can then use in other areas of the page, or use to test whether content exists in it or not.
<p>Example of passing page content to a User Defined Tag as a parameter:</p>
<pre>
         {content assign=pagecontent}
         {table_of_contents thepagecontent=&quot;$pagecontent&quot;}
</pre>
</li>
	</ul>';
$lang['admin']['help_function_contact_form'] = '  <h2>NOTE: This plugin is deprecated</h2>
    <p>This smarty plugin is deprecated, and may not be included with further versions of CMS Made Simple.  We recommend you use the formbuilder module and it&#039;s included contact form.</p>
	<h3>&iquest;Esto que hace?</h3>
	<p>Display&#039;s a contact form. This can be used to allow others to send an email message to the address specified.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{contact_form email=&quot;yourname@yourdomain.com&quot;}</code><br>
	<br>
	If you would like to send an email to multiple adresses, seperate each address with a comma.</p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<ul>
		<li>email - The email address that the message will be sent to.</li>
		<li><em>(optional)</em>style - true/false, use the predefined styles. Default is true.</li>
		<li><em>(optional)</em>subject_get_var - string, allows you to specify which _GET var to use as the default value for subject.
               <p>Example:</p>
               <pre>{contact_form email=&quot;yourname@yourdomain.com&quot; subject_get_var=&quot;subject&quot;}</pre>
             <p>Then call the page with the form on it like this: /index.php?page=contact&amp;subject=test+subject</p>
             <p>And the following will appear in the &quot;Subject&quot; box: &quot;test subject&quot;
           </li>
		<li><em>(optional)</em>captcha - true/false, use Captcha response test (Captcha module must be installed). Default is false.</li>
	</ul>
	</p>';
$lang['admin']['help_function_cms_versionname'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This tag is used to insert the current version name of CMS into your template or page.  It doesn&#039;t display any extra besides the version name.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>This is just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_versionname}</code>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>It takes no parameters.</p>';
$lang['admin']['help_function_cms_version'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This tag is used to insert the current version number of CMS into your template or page.  It doesn&#039;t display any extra besides the version number.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>This is just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_version}</code>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>It takes no parameters.</p>';
$lang['admin']['about_function_cms_selflink'] = '		<p>Author: Ted Kulp <tedkulp@users.sf.net></p>
		<p>Version: 1.1</p>
		<p>Modified: Martin B. Vestergaard <mbv@nospam.dk></p>
		<p>Version: 1.41</p>
		<p>Modified: Russ Baldwin</p>
		<p>Version: 1.42</p>
		<p>Modified: Marcus Bointon <coolbru@users.sf.net></p>
		<p>Version: 1.43</p>
		<p>Modified: Tatu Wikman <tsw@backspace.fi></p>
		<p>Version: 1.44</p>
		<p>Modified: Hans Mogren <http://hans.bymarken.net/></p>
		<p>Version: 1.45</p>

		<p>
		Change History:<br/>
		1.46 - Fixes a problem with too many queries when using the dir=start option.<br/>
		1.45 - Added a new option for &quot;dir&quot;, &quot;up&quot;, for links to the parent page e.g. dir=&quot;up&quot; (Hans Mogren).<br />
		1.44 - Added new parameters &quot;ext&quot; and &quot;ext_info&quot; to allow external links with class=&quot;external&quot; and info text after the link, ugly hack but works thinking about rewriting this(Tatu Wikman)<br />
		1.43 - Added new parameters &quot;image&quot; and &quot;imageonly&quot; to allow attachment of images to be used for page links, either instead of or in addition to text links. (Marcus Bointon)<br />
		1.42 - Added new parameter &quot;anchorlink&quot; and a new option for &quot;dir&quot; namely, &quot;anchor&quot;, for internal page links. e.g. dir=&quot;anchor&quot; anchorlink=&quot;internal_link&quot;. (Russ)<br />
		1.41 - added new parameter &quot;href&quot; (LeisureLarry)<br />
		1.4 - fixed bug next/prev linking to non-content pages. (Thanks Teemu Koistinen for this fix)<br />
		1.3 - added option &quot;more&quot;<br />
		1.2 - by Martin B. Vestergaard
		<ul>
		<li>changed default text to Page Name (was Page Alias)</li>
		<li>added option dir=next/prev to display next or previous item in the hirachy - thanks to 100rk</li>
		<li>added option class to add a class= statement to the a-tag.</li>
		<li>added option menu to display menu-text in sted of Page Name</li>
		<li>added option lang to display link-labels in different languages</li>
		</ul>
		1.1 - Changed to new content system<br />
		1.0 - Initial release
		</p>';
$lang['admin']['help_function_cms_selflink'] = '		<h3>&iquest;Esto que hace?</h3>
		<p>Creates a link to another CMSMS content page inside your template or content. Can also be used for external links with the ext parameter.</p>
		<h3>&iquest;Como se usa?</h3>
		<p>Just insert the tag into your template/page like: <code>{cms_selflink page=&quot;1&quot;}</code> or  <code>{cms_selflink page=&quot;alias&quot;}</code></p>
		<h3>&iquest;Que par&aacute;metros recibe?</h3>
		<p>
		<ul>
		<li><em>(optional)</em> <tt>page</tt> - Page ID or alias to link to.</li>
		<li><em>(optional)</em> <tt>dir anchor (internal links)</tt> - New option for an internal page link. If this is used then <tt>anchorlink</tt> should be set to your link. </li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>anchorlink</tt> - New paramater for an internal page link. If this is used then <tt>dir =&quot;anchor&quot;</tt> should also be set. No need to add the #, because it is added automatically.</li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>urlparam</tt> - Specify additional parameters to the URL.  <strong>Do not use this in conjunction with the <em>anchorlink</em> parameter</em></strong>
		<li><em>(optional)</em> <tt>tabindex =&quot;a value&quot;</tt> - Set a tabindex for the link.</li> <!-- Russ - 22-06-2005 -->
		<li><em>(optional)</em> <tt>dir start/next/prev/up (previous)</tt> - Links to the default start page or the next or previous page, or the parent page (up). If this is used <tt>page</tt> should not be set.</li> <!-- mbv - 21-06-2005 -->
		<B>Note!</B> Only one of the above may be used in the same cms_selflink statement!!
		<li><em>(optional)</em> <tt>text</tt> - Text to show for the link.  If not given, the Page Name is used instead.</li>
		<li><em>(optional)</em> <tt>menu 1/0</tt> - If 1 the Menu Text is used for the link text instead of the Page Name</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>target</tt> - Optional target for the a link to point to.  Useful for frame and javascript situations.</li>
		<li><em>(optional)</em> <tt>class</tt> - Class for the <a> link. Useful for styling the link.</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>lang</tt> - Display link-labels  (&quot;Next Page&quot;/&quot;Previous Page&quot;) in different languages (0 for no label.) Danish (dk), English (en) or French (fr), for now.</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>id</tt> - Optional css_id for the <a> link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>more</tt> - place additional options inside the <a> link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>label</tt> - Label to use in with the link if applicable.</li>
		<li><em>(optional)</em> <tt>label_side left/right</tt> - Side of link to place the label (defaults to &quot;left&quot;).</li>
		<li><em>(optional)</em> <tt>title</tt> - Text to use in the title attribute.  If none is given, then the title of the page will be used for the title.</li>
		<li><em>(optional)</em> <tt>rellink 1/0</tt> - Make a relational link for accessible navigation.  Only works if the dir parameter is set and should only go in the head section of a template.</li>
		<li><em>(optional)</em> <tt>href</tt> - If href is used only the href value is generated (no other parameters possible). <strong>Example:</strong> <a href="{cms_selflink href="alias"}"><img src=&quot;&quot;></a></li>
		<li><em>(optional)</em> <tt>image</tt> - A url of an image to use in the link. <strong>Example:</strong> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot;}</li>
		<li><em>(optional)</em> <tt>alt</tt> - Alternative text to be used with image (alt=&quot;&quot; will be used if no alt parameter is given).</li>
		<li><em>(optional)</em> <tt>imageonly</tt> - If using an image, whether to suppress display of text links. If you want no text in the link at all, also set lang=0 to suppress the label. <B>Example:</B> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot; imageonly=1}</li>
		<li><em>(optional)</em> <tt>ext</tt> - For external links, will add class=&quot;external and info text. <strong>warning:</strong> only text, target and title parameters are compatible with this parameter</li>
		<li><em>(optional)</em> <tt>ext_info</tt> - Used together with &quot;ext&quot; defaults to (external link)</li>
		</ul>
		</p>';
$lang['admin']['about_function_cms_module'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.0</p>
	<p>
	Change History:<br/>
	None
	</p>';
$lang['admin']['help_function_cms_module'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>This tag is used to insert modules into your templates and pages.  If a module is created to be used as a tag plugin (check it&#039;s help for details), then you should be able to insert it with this tag.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>It&#039;s just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_module module=&quot;somemodulename&quot;}</code>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>There is only one required parameter.  All other parameters are passed on to the module.
	<ul>
		<li>module - Name of the module to insert.  This is not case sensitive.</li>
	</ul>
	</p>';
$lang['admin']['about_function_breadcrumbs'] = '<p>Author: Marcus Deglos <<a href="mailto:md@zioncore.com">md@zioncore.com</a>></p>
<p>Version: 1.7</p>
<p>
Change History:<br/>
1.1 - Modified to use new content rewrite (wishy)<br />
1.2 - Added parameters: delimiter, initial, and root (arl)<br />
1.3 - Added parameter: classid (tdh / perl4ever)<br />
1.4 - Added parameter currentclassid and fixed some bugs (arl)<br />
1.5 - Modified to use new hierarchy manager<br />
1.6 - Modified to skip any parents that are marked to be &quot;not shown in menu&quot; except for root<br />
1.7 - Added root_url parameter (elijahlofgren)<br />
</p>';
$lang['admin']['help_function_breadcrumbs'] = '<h3>&iquest;Esto que hace?</h3>
<p>Prints a breadcrumb trail .</p>
<h3>&iquest;Como se usa?</h3>
<p>Just insert the tag into your template/page like: <code>{breadcrumbs}</code></p>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<p>
<ul>
<li><em>(optional)</em> <tt>delimiter</tt> - Text to seperate entries in the list (default &quot;>>&quot;).</li>
<li><em>(optional)</em> <tt>initial</tt> - 1/0 If set to 1 start the breadcrumbs with a delimiter (default 0).</li>
<li><em>(optional)</em> <tt>root</tt> - Page alias of a page you want to always appear as the first page in
    the list. Can be used to make a page (e.g. the front page) appear to be the root of everything even though it is not.</li>
<li><em>(optional)</em> <tt>root_url</tt> - Override the URL of the root page. Useful for making link be to &#039;/&#039; instead of &#039;/home/&#039;. This requires that the root page be set as the default page.</li>

<li><em>(optional)</em> <tt>classid</tt> - The CSS class for the non current page names, i.e. the first n-1 pages in the list. If the name is a link it is added to the <a href> tags, otherwise it is added to the <span> tags.</li>
<li><em>(optional)</em> <tt>currentclassid</tt> - The CSS class for the <span> tag surrounding the current page name.</li>
<li><em>(optional)</em> <tt>starttext</tt> - Text to append to the front of the breadcrumbs list, something like &quot;You are here&quot;.</li>
</ul>
</p>';
$lang['admin']['about_function_anchor'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.1</p>
	<p>
	Change History:<br/>
	<strong>Update to version 1.1 from 1.0</strong> <em>2006/07/19</em><br/>
	Russ added the means to insert a title, a tabindex and a class for the anchor link. Westis added accesskey and changed parameter names to not include &#039;anchorlink&#039;.<br/>
	</hr>
	</p>';
$lang['admin']['help_function_anchor'] = '	<h3>&iquest;Esto que hace?</h3>
	<p>Makes a proper anchor link.</p>
	<h3>&iquest;Como se usa?</h3>
	<p>Just insert the tag into your template/page like: <code>{anchor anchor=&#039;here&#039; text=&#039;Scroll Down&#039;}</code></p>
	<h3>&iquest;Que par&aacute;metros recibe?</h3>
	<p>
	<ul>
	<li><tt>anchor</tt> - Where we are linking to.  The part after the #.</li>
	<li><tt>text</tt> - The text to display in the link.</li>
	<li><tt>class</tt> - The class for the link, if any</li>
	<li><tt>title</tt> - The title to display for the link, if any.</li>
	<li><tt>tabindex</tt> - The numeric tabindex for the link, if any.</li>
	<li><tt>accesskey</tt> - The accesskey for the link, if any.</li>
	<li><em>(optional)</em> <tt>onlyhref</tt> - Only display the href and not the entire link. No other options will work</li>
	</ul>
	</p>';
$lang['admin']['help_function_site_mapper'] = '<h3>&iquest;Esto que hace?</h3>
  <p> De hecho es &uacute;nicamente una etiqueta envoltorio para  el 
 <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">m&oacute;dulo Administrador de Men&uacute;</a> para facilitar la sintaxis de la etiqueta, y para simplificar la creaci&oacute;n de un mapa del sitio</p>
<h3>&iquest;Como se usa?</h3>
  <p>Solo ponga  <code>{site_mapper}</code> en una p&aacute;gina o plantillaon a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module help</a>.</p>
  <p>By default, if no template option is specified the minimal_menu.tpl file will be used.</p>
  <p>Any parameters used in the tag are available in the menumanager template as <code>{$menuparams.paramname}</code></p>';
$lang['admin']['help_function_redirect_url'] = '<h3>&iquest;Esto que hace?</h3>
  <p>Este plugin permite facilmente redirigir a una url especificada. Es &uacute;til dentro de l&oacute;gica condicional  de smarty(por ejemplo, redirigir a una p&aacute;gina splash si el sitio a&uacute;n no est&aacute; activo).</p>
<h3>&iquest;Como se usa?</h3>
<p>Tan solo inserte esta etiqueta en su p&aacute;gina o plantilla: <code>{redirect_url urle=&#039;www.cmsmadesimple.org&#039;}</code></p>';
$lang['admin']['help_function_redirect_page'] = '<h3>&iquest;Esto que hace?</h3>
<p>Este plugin permite redirigir facilmente a otra p&aacute;gina. Es &uacute;til dentro de l&oacute;gica condicional de smarty (por ejemplo, redirigir a la p&aacute;gina de login si los usuarios no han iniciado sesi&oacute;n.)</p>
<h3>&iquest;Como se usa?</h3>
<p>Tan solo inserte esta etiqueta en su p&aacute;gina o plantilla: <code>{redirect_page page=&#039;some-page-alias&#039;}</code></p>';
$lang['admin']['help_function_cms_jquery'] = '<h3>&iquest;Esto que hace?</h3>
 <p>Este plugin permite sacar las librerias javascript y plugins usados del sitio administrativo.</p>
<h3>&iquest;Como se usa?</h3>
<p>simplemente inserte esta etiqueta en su p&aacute;gina o plantilla:<code>{cms_jquery}</code></p>
<h3>Muestra</h3>
<pre><code>{cms_jquery cdn=&#039;true&#039; exclude=&#039;jquery.ui.nestedSortable-1.3.4.js&#039; append=&#039;uploads/NCleanBlue/js/ie6fix.js&#039;}</code></pre>
<h4><em>Salidas</em></h4>
<pre><code><script type=&quot;text/javascript&quot; src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;http://localhost/1.10.x/lib/jquery/js/jquery.json-2.2.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;uploads/NCleanBlue/js/ie6fix.js&quot;></script>
</code></pre>
<h3><em>Incluidos por defecto</em></h3>
<ul>
	<li><tt>jQuery</tt><em>(1.6.2)</em> - jquery-1.7.1.min.js</li>
	<li><tt>jQuery UI</tt><em>(1.8.14)</em> - jquery-ui-1.8.18.min.js</li>
	<li><tt>nestedSortable</tt>(1.3.4) - jquery/js/jquery.ui.nestedSortable-1.3.4.js</li>
	<li><tt>jQuery json</tt><em>(2.2)</em> - jquery/js/jquery.json-2.2.js</li>
</ul>
<h3>&iquest;Que par&aacute;metros recibe?</h3>
<ul>
	<li><em>(optional) </em><tt>exclude</tt> - Use una lista de scripts que desea excluir formateado en valores separados por comas (CSV).
<code>&#039;jquery.ui.nestedSortable.js,jquery.json-2.2.js&#039;</code></li>
	<li><em>(optional) </em><tt>append</tt> - Use una lista de rutas que dease incluir formateado en valores separados por comas(CSV). <code>&#039;/uploads/jquery.ui.nestedSortable.js,http://code.jquery.com/jquery-1.7.1.min.js&#039;</code></li>
	<li><em>(optional) </em><tt>cdn</tt> - cdn=&#039;verdadero&#039; insertar&aacute; los frameworks  usando la  Google&#039;s Content Delivery Netwok. Por defecto es falso.</li>
	<li><em>(optional) </em><tt>ssl</tt> - uselo para utilzar url_ssl como la ruta base.</li>
	<li><em>(optional) </em><tt>custom_root</tt> - Se usa para seleccionar cualquier  ruta base deseada.<code>custom_root=&#039;http://test.domain.com/&#039;</code> <br/>NOTE: Sobreescribe  la opci&oacute;n ssl y trabaja con la opci&oacute;n cdn</li>
	<li><em>(optional)</em> <tt>assign</tt>  - Asigna los resultados a la variable smarty nombrada.</li>
	</ul>

';
$lang['admin']['of'] = 'de';
$lang['admin']['first'] = 'Primero';
$lang['admin']['last'] = '&Uacute;ltimo';
$lang['admin']['adminspecialgroup'] = 'Atenci&oacute;n: Los miembros de este grupo autom&aacute;ticamente tienen todos los permisos';
$lang['admin']['disablesafemodewarning'] = 'Desactivar aviso de &quot;safe mode&quot;';
$lang['admin']['date_format_string'] = 'Formato de Fecha';
$lang['admin']['date_format_string_help'] = 'formato de fecha tipo <em>strftime</em>';
$lang['admin']['last_modified_at'] = 'Ultima modificaci&oacute;n el';
$lang['admin']['last_modified_by'] = 'Ultima modificaci&oacute;n de';
$lang['admin']['read'] = 'Leer';
$lang['admin']['write'] = 'Escribir';
$lang['admin']['execute'] = 'Ejecutar';
$lang['admin']['group'] = 'Grupo';
$lang['admin']['other'] = 'Otros';
$lang['admin']['event_desc_moduleupgraded'] = 'Se env&iacute;a al actualizar un m&oacute;dulo';
$lang['admin']['event_help_moduleupgraded'] = '<p>Enviado despues de actualizar el modulo.</p>';
$lang['admin']['event_desc_moduleinstalled'] = 'Se env&iacute;a al instalar un m&oacute;dulo';
$lang['admin']['event_help_moduleinstalled'] = '<p>Enviado despues de instalar el modulo.</p>';
$lang['admin']['event_desc_moduleuninstalled'] = 'Se env&iacute;a al desinstalar un m&oacute;dulo';
$lang['admin']['event_help_moduleuninstalled'] = '<p>Enviado despues de desinstalar el modulo.</p>';
$lang['admin']['event_desc_edituserdefinedtagpost'] = 'Se env&iacute;a al actualizar un tag personalizado';
$lang['admin']['event_help_edituserdefinedtagpost'] = '<p>Enviado despues de actualizar una etiqueta definida por el usuario.</p>';
$lang['admin']['event_desc_edituserdefinedtagpre'] = 'Se env&iacute;a antes de actualizar un tag personalizado';
$lang['admin']['event_help_edituserdefinedtagpre'] = '<p>Enviado antes de actualizar una etiqueta definida por el usuario.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpre'] = 'Se env&iacute;a antes de borrar un tag personalizado';
$lang['admin']['event_help_deleteuserdefinedtagpre'] = '<p>Enviado antes de eleiminar una etiqueta definida por el usuario.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpost'] = 'Se env&iacute;a al borrar un tag personalizado';
$lang['admin']['event_help_deleteuserdefinedtagpost'] = '<p>Enviado despues de borrar una etiqueda definida por el usuario.</p>';
$lang['admin']['event_desc_adduserdefinedtagpost'] = 'Se env&iacute;a al insertar un tag personalizado';
$lang['admin']['event_help_adduserdefinedtagpre'] = '<p>Enviado despuies de insertar una etiqueta definida por el usuario</p>';
$lang['admin']['event_desc_adduserdefinedtagpre'] = 'Se env&iacute;a antes de insertar un tag personalizado';
$lang['admin']['event_help_adduserdefinedtagpost'] = '<p>Enviado antes de insertar una etiqueta definida por el usuario,</p>';
$lang['admin']['global_umask'] = 'M&aacute;scara de Archivo';
$lang['admin']['errorcantcreatefile'] = 'No se puede crear un archivo (&iquest;problema de permisos?)';
$lang['admin']['errormoduleversionincompatible'] = 'M&oacute;dulo incompatible con esta versi&oacute;n de CMSMS';
$lang['admin']['errormodulenotloaded'] = 'Error interno, el m&oacute;dulo no ha sido instanciado';
$lang['admin']['errormodulenotfound'] = 'Error interno, no se encuentra la instancia de un m&oacute;dulo';
$lang['admin']['errorinstallfailed'] = 'Fallo en la instalaci&oacute;n del  M&oacute;dulo';
$lang['admin']['errormodulewontload'] = 'Problema al instanciar un m&oacute;dulo existente';
$lang['admin']['frontendlang'] = 'Idioma por defecto para el sitio';
$lang['admin']['info_edituser_password'] = 'Cambia este campo para cambiar la contrase&ntilde;a del usuario';
$lang['admin']['info_edituser_passwordagain'] = 'Cambia este campo para cambiar la contrase&ntilde;a del usuario';
$lang['admin']['originator'] = 'Originador';
$lang['admin']['module_name'] = 'Nombre del M&oacute;dulo';
$lang['admin']['event_name'] = 'Nombre del evento';
$lang['admin']['event_description'] = 'Descripci&oacute;n del Evento';
$lang['admin']['error_delete_default_parent'] = 'No puedes borrar la raiz de una p&aacute;gina por defecto.';
$lang['admin']['jsdisabled'] = 'Lo siento, esta funci&oacute;n requiere tener Javascript habilitado.';
$lang['admin']['order'] = 'Ordenar';
$lang['admin']['reorderpages'] = 'Reordenar P&aacute;gina';
$lang['admin']['reorder'] = 'Reordenar';
$lang['admin']['page_reordered'] = 'P&aacute;gina reordenada correctamente.';
$lang['admin']['pages_reordered'] = 'P&aacute;ginas reordenadas correctamente.';
$lang['admin']['sibling_duplicate_order'] = 'Dos p&aacute;ginas hermanadas no pueden tener el mismo orden. P&aacute;ginas no reordenadas.';
$lang['admin']['no_orders_changed'] = 'Has elegido reordenar p&aacute;ginas, pero no has cambiado el orden de ninguna de ellas. P&aacute;ginas no reordenadas.';
$lang['admin']['order_too_small'] = 'El orden no puede ser cero. P&aacute;ginas no reordenadas.';
$lang['admin']['order_too_large'] = 'El orden de una p&aacute;gina no puede ser m&aacute;s alto que el numero de p&aacute;ginas en ese nivel. P&aacute;ginas no reordenadas.';
$lang['admin']['user_tag'] = 'Tag Personalizado';
$lang['admin']['add'] = 'A&ntilde;adir';
$lang['admin']['CSS'] = 'CSS ';
$lang['admin']['about'] = 'Acerca de';
$lang['admin']['action'] = 'Acci&oacute;n';
$lang['admin']['actionstatus'] = 'Acci&oacute;n/Estado';
$lang['admin']['active'] = 'Activo';
$lang['admin']['addcontent'] = 'A&ntilde;adir Contenido';
$lang['admin']['cantremove'] = 'No se puede Borrar';
$lang['admin']['changepermissions'] = 'Cambiar Permisos';
$lang['admin']['changepermissionsconfirm'] = 'ATENCION\n\nEsta acci&oacute;n comprueba que todos los archivos que componmen el m&oacute;dulo pueden ser escritos por el servidor. \n&iquest;Seguro que quieres continuar?';
$lang['admin']['contentadded'] = 'El contenido fue a&ntilde;adido a la base de datos correctamente.';
$lang['admin']['contentupdated'] = 'El contenido fue actualizado correctamente.';
$lang['admin']['contentdeleted'] = 'El contenido fue eliminado de la base de datos correctamente.';
$lang['admin']['success'] = 'Correcto';
$lang['admin']['addcss'] = 'A&ntilde;adir una Hoja de Estilo';
$lang['admin']['addgroup'] = 'A&ntilde;adir Nuevo Grupo';
$lang['admin']['additionaleditors'] = 'Otros Editores';
$lang['admin']['addtemplate'] = 'A&ntilde;adir Nueva Plantilla';
$lang['admin']['adduser'] = 'A&ntilde;adir Nuevo Usuario';
$lang['admin']['addusertag'] = 'A&ntilde;adir Tag Personalizada';
$lang['admin']['adminaccess'] = 'Acceso a administraci&oacute;n';
$lang['admin']['adminlog'] = 'Registro de Actividad';
$lang['admin']['adminlogcleared'] = 'El Registro de Actividad se ha borrado con &eacute;xito';
$lang['admin']['adminlogempty'] = 'El Registro de Actividad est&aacute; vacio';
$lang['admin']['adminsystemtitle'] = 'Administraci&oacute;n del CMS';
$lang['admin']['adminpaneltitle'] = 'Panel de Administrador de CMSMS';
$lang['admin']['advanced'] = 'Avanzado';
$lang['admin']['aliasalreadyused'] = 'Este Alias ya ha sido asignado a otra p&aacute;gina. Cambiar &quot;pageAlias&quot; en la pesta&ntilde;a de &quot;Opciones&quot; por algo distinto.';
$lang['admin']['aliasmustbelettersandnumbers'] = 'El alias debe ser todo letras y n&uacute;meros';
$lang['admin']['aliasnotaninteger'] = 'El Alias no puede ser un entero';
$lang['admin']['allpagesmodified'] = '&iexcl;Todas las P&aacute;ginas modificadas!';
$lang['admin']['assignments'] = 'Asignar Usuarios';
$lang['admin']['associationexists'] = 'Esta asociaci&oacute;n ya existe';
$lang['admin']['autoinstallupgrade'] = 'Instalar o actualizar Autom&aacute;ticamente';
$lang['admin']['back'] = 'Volver al Menu';
$lang['admin']['backtoplugins'] = 'Volver al listado de Plugins';
$lang['admin']['cancel'] = 'Cancelar';
$lang['admin']['cantchmodfiles'] = 'No se pudieron cambiar los permisos de algunos archivos';
$lang['admin']['cantremovefiles'] = 'Problema al Borrar Archivos (&iquest;permisos?)';
$lang['admin']['confirmcancel'] = '&iquest;Seguro que quieres descartar los cambios? OK descarta todos los cambios. Cancelar continua editando.';
$lang['admin']['canceldescription'] = 'Descartar Cambios';
$lang['admin']['clearadminlog'] = 'Borrar Log';
$lang['admin']['code'] = 'C&oacute;digo';
$lang['admin']['confirmdefault'] = '&iquest;Seguro que quieres cambiar la p&aacute;gina por defecto?';
$lang['admin']['confirmdeletedir'] = '&iquest;Seguro que quieres borrar este directorio y todo su contenido?';
$lang['admin']['content'] = 'Contenido';
$lang['admin']['contentmanagement'] = 'Gesti&oacute;n de Contenido';
$lang['admin']['contenttype'] = 'Tipo de Contenido';
$lang['admin']['copy'] = 'Copiar';
$lang['admin']['copytemplate'] = 'Copiar Plantilla';
$lang['admin']['create'] = 'Crear';
$lang['admin']['createnewfolder'] = 'Crear Carpeta';
$lang['admin']['cssalreadyused'] = 'Nombre de CSS ya en uso';
$lang['admin']['cssmanagement'] = 'Gesti&oacute;n  de CSS';
$lang['admin']['currentassociations'] = 'Asociaciones';
$lang['admin']['currentdirectory'] = 'Directorio';
$lang['admin']['currentgroups'] = 'Grupos ';
$lang['admin']['currentpages'] = 'P&aacute;ginas';
$lang['admin']['currenttemplates'] = 'Plantillas';
$lang['admin']['currentusers'] = 'Usuarios';
$lang['admin']['custom404'] = 'Mensaje de Error 404 Propio';
$lang['admin']['database'] = 'Base de Datos';
$lang['admin']['databaseprefix'] = 'Prefijo de B.D.';
$lang['admin']['databasetype'] = 'Tipo de B.D.';
$lang['admin']['date'] = 'Fecha';
$lang['admin']['default'] = 'Por Defecto';
$lang['admin']['delete'] = 'Borrar';
$lang['admin']['deleteconfirm'] = '&iquest;Seguro que quieres borrar?';
$lang['admin']['deleteassociationconfirm'] = '&iquest;Seguro que quieres borrar la asociaci&oacute;n a - %s - ?';
$lang['admin']['deletecss'] = 'Borrar CSS';
$lang['admin']['dependencies'] = 'Dependencias';
$lang['admin']['description'] = 'Descripci&oacute;n';
$lang['admin']['directoryexists'] = 'Este directorio ya existe.';
$lang['admin']['down'] = 'Abajo';
$lang['admin']['edit'] = 'Editar';
$lang['admin']['editconfiguration'] = 'Editar Configuraci&oacute;n';
$lang['admin']['editcontent'] = 'Editar Contenido';
$lang['admin']['editcss'] = 'Editar Hoja de Estilo';
$lang['admin']['editcsssuccess'] = 'Hoja de estilo actualizada';
$lang['admin']['editgroup'] = 'Editar Grupo';
$lang['admin']['editpage'] = 'Editar P&aacute;gina';
$lang['admin']['edittemplate'] = 'Editar Plantilla';
$lang['admin']['edittemplatesuccess'] = 'Plantilla actualizada';
$lang['admin']['edituser'] = 'Editar Usuario';
$lang['admin']['editusertag'] = 'Editar Tag Personalizado';
$lang['admin']['usertagadded'] = 'Se a&ntilde;adi&oacute; el Tag Personalizado correctamente.';
$lang['admin']['usertagupdated'] = 'Se actualiz&oacute; el Tag Personalizado correctamente.';
$lang['admin']['usertagdeleted'] = 'Se borr&oacute; el Tag Personalizado correctamente.';
$lang['admin']['email'] = 'Direcci&oacute;n Email';
$lang['admin']['errorattempteddowngrade'] = 'Instalar este m&oacute;dulo resultar&iacute;a conflictivo.  Operaci&oacute;n abortada';
$lang['admin']['errorchildcontent'] = 'Contenido con sub-contenido. Elim&iacute;nalo primero, por favor.';
$lang['admin']['errorcopyingtemplate'] = 'Error al copiar Plantilla';
$lang['admin']['errorcouldnotparsexml'] = 'Error al traducir archivo XML';
$lang['admin']['errorcreatingassociation'] = 'Error al crear asociaci&oacute;n';
$lang['admin']['errorcssinuse'] = 'Hoja de estilo en uso por plantilla o p&aacute;ginas. Elimina esasasocicciones primero, por favor.';
$lang['admin']['errordefaultpage'] = 'No se puede borrar la p&aacute;gina por defecto. Asigna una diferente primero.';
$lang['admin']['errordeletingassociation'] = 'Error al borrar asociaci&oacute;n';
$lang['admin']['errordeletingcss'] = 'Error al borrar CSS';
$lang['admin']['errordeletingdirectory'] = 'No se pudo borrar el diractorio. Revisar permisos';
$lang['admin']['errordeletingfile'] = 'No se pudo borrar el archivo. Revisar permisos';
$lang['admin']['errordirectorynotwritable'] = 'Sin permiso para escribir en el directorio';
$lang['admin']['errordtdmismatch'] = 'Sin versi&oacute;n DTD o incompatible en el archivo XML';
$lang['admin']['errorgettingcssname'] = 'Error al obtener el nombre de la Hoja de Estilo';
$lang['admin']['errorgettingtemplatename'] = 'Error al obtener el nombre de la Plantilla';
$lang['admin']['errorincompletexml'] = 'Archivo XML incompleto o no v&aacute;lido';
$lang['admin']['uploadxmlfile'] = 'Instalar m&oacute;dulo via archivo XML';
$lang['admin']['cachenotwritable'] = 'El directorio Cache no es escribible. Borrar la cache no funcionar&aacute;. Cambia los permisos del directorio tmp/cache (chmod 777)';
$lang['admin']['error_nomodules'] = '&iexcl;No hay m&oacute;dulos instalados! No modules installed! Consultar Extensiones > Modulos';
$lang['admin']['modulesnotwritable'] = 'El directorio modules no se puede escribir. Si quieres instalar m&oacute;dulos subiendo un archivo XML, necesitas cambiar los permisos del directorio modules (chmod 777).';
$lang['admin']['noxmlfileuploaded'] = 'No se subi&oacute; el erchivo. Para instalar un m&oacute;dulo via XML debes elegir y subir un archivo .xml desde tu ordenador.';
$lang['admin']['errorinsertingcss'] = 'Error al insertar Hoja de Estilo';
$lang['admin']['errorinsertinggroup'] = 'Error al insertar grupo';
$lang['admin']['errorinsertingtag'] = 'Error al insertar tag';
$lang['admin']['errorinsertingtemplate'] = 'Error al insertar Plantilla';
$lang['admin']['errorinsertinguser'] = 'Error al insertar Usuario';
$lang['admin']['errornofilesexported'] = 'Error al exportar a XML';
$lang['admin']['errorretrievingcss'] = 'Error al recuperar Hoja de Estilo';
$lang['admin']['errorretrievingtemplate'] = 'Error al recuperar Pantilla';
$lang['admin']['errortemplateinuse'] = 'Esta Plantilla la usa todavia una p&aacute;gina. Elim&iacute;nala primero, por favor.';
$lang['admin']['errorupdatingcss'] = 'Error al actualizar Hoja de Estilo';
$lang['admin']['errorupdatinggroup'] = 'Error al actualizar grupo';
$lang['admin']['errorupdatingpages'] = 'Error al actulaizar p&aacute;ginas';
$lang['admin']['errorupdatingtemplate'] = 'Error al actualizar plantilla';
$lang['admin']['errorupdatinguser'] = 'Error al actualizar usuario';
$lang['admin']['errorupdatingusertag'] = 'Error al actualizar tag';
$lang['admin']['erroruserinuse'] = 'Existe contenido creado por este usuario. Cambiar este usuario por otro antes de eliminarlo.';
$lang['admin']['eventhandlers'] = 'Eventos';
$lang['admin']['eventhandler'] = 'Controladores de eventos';
$lang['admin']['editeventhandler'] = 'Editar Manejador de Evento';
$lang['admin']['eventhandlerdescription'] = 'Asocia tags personalizados con eventos';
$lang['admin']['export'] = 'Exportar';
$lang['admin']['event'] = 'Evento';
$lang['admin']['false'] = 'Falso';
$lang['admin']['settrue'] = 'Poner a True';
$lang['admin']['filecreatedirnodoubledot'] = 'El directorio no puede contener &#039;..&#039;.';
$lang['admin']['filecreatedirnoname'] = 'No se puede crear un directorio sin nombre.';
$lang['admin']['filecreatedirnoslash'] = 'El directorio no puede contener &#039;/&#039; ni &#039;\&#039;.';
$lang['admin']['filemanagement'] = 'Gesti&oacute;n de archivos';
$lang['admin']['filename'] = 'Nombre de archivo';
$lang['admin']['filenotuploaded'] = 'No se pudo subir el archivo. Revisar permisos.';
$lang['admin']['filesize'] = 'Tama&ntilde;o';
$lang['admin']['firstname'] = 'Nombre';
$lang['admin']['groupmanagement'] = 'Gesti&oacute;n de Grupos';
$lang['admin']['grouppermissions'] = 'Permisos de Grupos';
$lang['admin']['handler'] = 'Manejador (tag personalizado)';
$lang['admin']['headtags'] = 'Tags <head>';
$lang['admin']['help'] = 'Ayuda';
$lang['admin']['new_window'] = 'nueva ventana';
$lang['admin']['helpwithsection'] = '%s Ayuda';
$lang['admin']['helpaddtemplate'] = '<p>Una Plantilla es lo que controla el aspecto del contenido del sitio.</p><p>Crea la plantilla aqu&iacute; y luego a&ntilde;ade tu CSS en la secci&oacute;n Hojas de Estilo para controlar el aspecto de todos sus elementos.</p>';
$lang['admin']['helplisttemplate'] = '<p>Esta p&aacute;gina te permite editar, borrar y crear plantillas.</p><p>Para crear una nueva plantilla, haz click en <u>A&ntilde;adir plantilla</u>.</p><p>Si quieres que todas las p&aacute;ginas usen la misma plantilla, haz click en <u>Asignar a Todo</u>.</p><p>si quieres duplicar una plantilla, haz click en <u>Copiar</u> y se te pedir&aacute; un nombre para la nueva plantilla duplicada.</p>';
$lang['admin']['home'] = 'Inicio';
$lang['admin']['homepage'] = 'P&aacute;gina de Inicio';
$lang['admin']['hostname'] = 'Nombre del Host';
$lang['admin']['idnotvalid'] = 'El id dado no es v&aacute;lido';
$lang['admin']['imagemanagement'] = 'Gestor de Im&aacute;genes';
$lang['admin']['informationmissing'] = 'No existe informaci&oacute;n';
$lang['admin']['install'] = 'Instalar';
$lang['admin']['invalidcode'] = 'C&oacute;digo no v&aacute;lido.';
$lang['admin']['illegalcharacters'] = 'Caracteres no v&aacute;lidos en campo %s.';
$lang['admin']['invalidcode_brace_missing'] = 'N&uacute;mero impar de corchetes';
$lang['admin']['invalidtemplate'] = 'La plantilla no es v&aacute;lida';
$lang['admin']['itemid'] = 'ID';
$lang['admin']['itemname'] = 'Nombre';
$lang['admin']['language'] = 'Idioma';
$lang['admin']['lastname'] = 'Apellidos';
$lang['admin']['logout'] = 'Salir';
$lang['admin']['loginprompt'] = 'Teclea tus datos de usuario para tener acceso al Panel de Administraci&oacute;n.';
$lang['admin']['logintitle'] = 'Acceso de Administrador a CMS Made Simple';
$lang['admin']['menutext'] = 'Texto del Menu';
$lang['admin']['missingparams'] = 'Algunos par&aacute;metros faltan o no son v&aacute;lidos';
$lang['admin']['modifygroupassignments'] = 'Modificar Asignaci&oacute;n de Grupos';
$lang['admin']['moduleabout'] = 'Acerca de del m&oacute;dulo %s';
$lang['admin']['modulehelp'] = 'Ayuda para el m&oacute;dulo %s';
$lang['admin']['msg_defaultcontent'] = 'Agregar c&oacute;digo aqu&iacute; que aparecer&aacute; como contenido por defecto en toda p&aacute;gina nueva';
$lang['admin']['msg_defaultmetadata'] = 'Agregar c&oacute;digo aqu&iacute; que aparecer&aacute; en la secci&oacute;n metadata de toda p&aacute;gina nueva';
$lang['admin']['wikihelp'] = 'Ayuda de la Comunidad';
$lang['admin']['moduleinstalled'] = 'M&oacute;dulo ya instalado';
$lang['admin']['moduleinterface'] = 'Interface de %s';
$lang['admin']['modules'] = 'M&oacute;dulos';
$lang['admin']['move'] = 'Mover';
$lang['admin']['name'] = 'Nombre';
$lang['admin']['needpermissionto'] = 'Necesitas permisos de &#039;%s&#039; para usar esa funci&oacute;n.';
$lang['admin']['needupgrade'] = 'Necesita Actualizar';
$lang['admin']['newtemplatename'] = 'Nuevo Nombre de Plantilla';
$lang['admin']['next'] = 'Siguiente';
$lang['admin']['noaccessto'] = 'Sin Acceso a %s';
$lang['admin']['nocss'] = 'Sin Hoja de Estilo';
$lang['admin']['noentries'] = 'Sin Datos';
$lang['admin']['nofieldgiven'] = '&iexcl;No has dado %s!';
$lang['admin']['nofiles'] = 'Sin Archivos';
$lang['admin']['nopasswordmatch'] = 'La Clave no concuerda';
$lang['admin']['norealdirectory'] = 'No has dado un directorio real';
$lang['admin']['norealfile'] = 'No has dado un archivo real';
$lang['admin']['notinstalled'] = 'No Instalado';
$lang['admin']['overwritemodule'] = 'Sobreescribir m&oacute;dulos existentes';
$lang['admin']['owner'] = 'Autor';
$lang['admin']['pagealias'] = 'Alias';
$lang['admin']['content_id'] = 'ID del contenido';
$lang['admin']['pagedefaults'] = 'Valores por Defecto de la P&aacute;gina';
$lang['admin']['pagedefaultsdescription'] = 'Establecer los valores por defecto para nuevas p&aacute;ginas';
$lang['admin']['parent'] = 'Arbol';
$lang['admin']['password'] = 'Clave';
$lang['admin']['passwordagain'] = 'Clave (de nuevo)';
$lang['admin']['permission'] = 'Permiso';
$lang['admin']['permissions'] = 'Permisos';
$lang['admin']['permissionschanged'] = 'Permisos actualizados.';
$lang['admin']['pluginabout'] = 'Acerca del tag %s';
$lang['admin']['pluginhelp'] = 'Ayuda para el tag %s';
$lang['admin']['pluginmanagement'] = 'Gesti&oacute;n de Plugins';
$lang['admin']['prefsupdated'] = 'Preferencias  actualizadas.';
$lang['admin']['accountupdated'] = 'Cuenta de usuario actualizada';
$lang['admin']['preview'] = 'Previsualizar';
$lang['admin']['previewdescription'] = 'Previsualizar cambios';
$lang['admin']['previous'] = 'Anterior';
$lang['admin']['remove'] = 'Borrar';
$lang['admin']['removeconfirm'] = 'Esta acci&oacute;n borrar&aacute; los archivos que componen el m&oacute;dulo de esta instalaci&oacute;n.\n&iquest;Seguro que quieres borrarlos?';
$lang['admin']['removecssassociation'] = 'Borrar Asociaci&oacute;n de Hoja de Estilo';
$lang['admin']['saveconfig'] = 'Guardar Configuraci&oacute;n';
$lang['admin']['send'] = 'Enviar';
$lang['admin']['setallcontent'] = 'Asignar a Todo';
$lang['admin']['setallcontentconfirm'] = '&iquest;Seguro que quieres asignar esta plantilla a todas las p&aacute;ginas?';
$lang['admin']['showinmenu'] = 'Mostrar en Menu';
$lang['admin']['use_name'] = 'Use el nombre de la p&aacute;gina en el desplegable padre o, en caso contrario, el texto del men&uacute;';
$lang['admin']['showsite'] = 'Mostrar Sitio';
$lang['admin']['sitedownmessage'] = 'Mensaje de Sitio Desactivado';
$lang['admin']['siteprefs'] = 'Configuraci&oacute;n General';
$lang['admin']['status'] = 'Estado';
$lang['admin']['stylesheet'] = 'Hoja de Estilo';
$lang['admin']['submit'] = 'Enviar';
$lang['admin']['submitdescription'] = 'Guardar cambios';
$lang['admin']['tags'] = 'Tags ';
$lang['admin']['template'] = 'Plantilla';
$lang['admin']['templateexists'] = 'Nombre de plantilla ya existe';
$lang['admin']['templatemanagement'] = 'Gesti&oacute;n de Plantillas';
$lang['admin']['title'] = 'T&iacute;tulo';
$lang['admin']['tools'] = 'Herramientas';
$lang['admin']['true'] = 'Verdadero';
$lang['admin']['setfalse'] = 'Poner a False';
$lang['admin']['type'] = 'Tipo';
$lang['admin']['typenotvalid'] = 'Tipo no v&aacute;lido';
$lang['admin']['uninstall'] = 'Desinstalar';
$lang['admin']['uninstallconfirm'] = '&iquest;Seguro que quieres desinstalar esto?';
$lang['admin']['up'] = 'Arriba';
$lang['admin']['upgrade'] = 'Actualizar';
$lang['admin']['upgradeconfirm'] = '&iquest;Seguro que quieres actualizar esto?';
$lang['admin']['uploadfile'] = 'Subir Archivo';
$lang['admin']['url'] = 'URL ';
$lang['admin']['useadvancedcss'] = 'Usar Gesti&oacute;n Avanzada de Hojas de Estilo';
$lang['admin']['user'] = 'Usuario';
$lang['admin']['userdefinedtags'] = 'Tags personalizados';
$lang['admin']['usermanagement'] = 'Gesti&oacute;n de Usuarios';
$lang['admin']['username'] = 'Nombre';
$lang['admin']['usernameincorrect'] = 'Nombre o clave incorrectas';
$lang['admin']['userprefs'] = 'Preferencias de Usuario';
$lang['admin']['useraccount'] = 'Cuenta de usuario';
$lang['admin']['lang_settings_legend'] = 'Ajustes de lenguaje';
$lang['admin']['content_editor_legend'] = 'Ajustes del editor de contenido';
$lang['admin']['admin_layout_legend'] = 'Ajustes de dise&ntilde;o de la administraci&oacute;n';
$lang['admin']['usersassignedtogroup'] = 'Usuarios Asignados al Grupo %s';
$lang['admin']['usertagexists'] = 'Ya existe un tag con este nombre. Debes elegir otro.';
$lang['admin']['usewysiwyg'] = 'Usar editor WYSIWYG para el contenido';
$lang['admin']['version'] = 'Versi&oacute;n';
$lang['admin']['view'] = 'Ver';
$lang['admin']['welcomemsg'] = 'Bienvenido %s';
$lang['admin']['directoryabove'] = 'directorio por encima del nivel actual';
$lang['admin']['nodefault'] = 'Por defecto no seleccionado';
$lang['admin']['blobexists'] = 'Nombre del Bloque ya existe';
$lang['admin']['blobmanagement'] = 'Gesti&oacute;n de Bloques de Contenido Global (GCB)';
$lang['admin']['errorinsertingblob'] = 'Hubo un error al insertar el bloque de contenido global (GCB)';
$lang['admin']['addhtmlblob'] = 'A&ntilde;adir Bloque de contenido global (GCB)';
$lang['admin']['edithtmlblob'] = 'Editar Bloque de Contenido Global (GCB)';
$lang['admin']['edithtmlblobsuccess'] = 'Blocke actualizado';
$lang['admin']['tagtousegcb'] = 'Tag para Usar este Bloque';
$lang['admin']['gcb_wysiwyg'] = 'Habilitar WYSIWYG';
$lang['admin']['gcb_wysiwyg_help'] = 'Habilita el editor WYSIWYG mientras se editan Bloques';
$lang['admin']['filemanager'] = 'Gesti&oacute;n de Archivos';
$lang['admin']['imagemanager'] = 'Gesti&oacute;n de Im&aacute;genes';
$lang['admin']['encoding'] = 'Codificaci&oacute;n';
$lang['admin']['clearcache'] = 'Borrar Cach&eacute;';
$lang['admin']['clear'] = 'Borrar';
$lang['admin']['cachecleared'] = 'Cache Borrada';
$lang['admin']['apply'] = 'Aplicar';
$lang['admin']['applydescription'] = 'Guardar cambios y continuar edici&oacute;n';
$lang['admin']['none'] = 'Nada';
$lang['admin']['wysiwygtouse'] = 'Seleccionar WYSIWYG a usar';
$lang['admin']['syntaxhighlightertouse'] = 'Selecciona resaltador de sintaxis a usar';
$lang['admin']['hasdependents'] = 'Tiene Dependencias';
$lang['admin']['missingdependency'] = 'Sin Dependencias';
$lang['admin']['minimumversion'] = 'Versi&oacute;n M&iacute;nima';
$lang['admin']['minimumversionrequired'] = 'Versi&oacute;on de CMSMS M&iacute;nima Necesaria';
$lang['admin']['maximumversion'] = 'Versi&oacute;n M&aacute;xima';
$lang['admin']['maximumversionsupported'] = 'Versi&oacute;on de CMSMS M&aacute;xima Soportada';
$lang['admin']['depsformodule'] = 'Dependencias del M&oacute;dulo %s';
$lang['admin']['installed'] = 'Instalado';
$lang['admin']['author'] = 'Autor';
$lang['admin']['changehistory'] = 'Cambiar Historial';
$lang['admin']['moduleerrormessage'] = 'Mensaje de Error en M&oacute;dulo %s';
$lang['admin']['moduleupgradeerror'] = 'Hubo un error al actualizar el m&oacute;dulo.';
$lang['admin']['moduleinstallmessage'] = 'Mensaje de la Instalaci&oacute;n para el M&oacute;dulo %s';
$lang['admin']['moduleuninstallmessage'] = 'Mensaje de la Desinstalaci&oacute;n para el M&oacute;dulo %s';
$lang['admin']['admintheme'] = 'Plantilla de Administraci&oacute;n';
$lang['admin']['addstylesheet'] = 'A&ntilde;adir Hoja de Estilo';
$lang['admin']['editstylesheet'] = 'Editar Hoja de Estilo';
$lang['admin']['addcssassociation'] = 'Crear Asociaci&oacute;n a Hoja de Estilo';
$lang['admin']['attachstylesheet'] = 'Adjuntar eta Hoja de Estilo';
$lang['admin']['attachtemplate'] = 'Adjuntar a esta Plantilla';
$lang['admin']['main'] = 'Principal';
$lang['admin']['pages'] = 'P&aacute;ginas';
$lang['admin']['page'] = 'P&aacute;gina';
$lang['admin']['files'] = 'Archivos';
$lang['admin']['layout'] = 'Dise&ntilde;o';
$lang['admin']['usersgroups'] = 'Usuarios y Grupos';
$lang['admin']['extensions'] = 'Extensiones';
$lang['admin']['preferences'] = 'Preferencias';
$lang['admin']['admin'] = 'Sitio';
$lang['admin']['viewsite'] = 'Ver Sitio';
$lang['admin']['templatecss'] = 'Asgnar Plantilla a Hoja de Estilo';
$lang['admin']['plugins'] = 'Plugins ';
$lang['admin']['movecontent'] = 'Mover P&aacute;ginas';
$lang['admin']['module'] = 'M&oacute;dulo';
$lang['admin']['usertags'] = 'Tags Personalizados (UDTs)';
$lang['admin']['htmlblobs'] = 'Bloques de Contenido Global (GCBs)';
$lang['admin']['adminhome'] = 'Inicio';
$lang['admin']['liststylesheets'] = 'Hojas de Estilo';
$lang['admin']['preferencesdescription'] = 'Aqu&iacute; es donde se asignan las preferencias del sitio.';
$lang['admin']['adminlogdescription'] = 'Muestra un registro de actividad en administraci&oacute;n.';
$lang['admin']['mainmenu'] = 'Menu Principal';
$lang['admin']['users'] = 'Usuarios';
$lang['admin']['usersdescription'] = 'Aqu&iacute; se gestionan los usuarios.';
$lang['admin']['groups'] = 'Grupos';
$lang['admin']['groupsdescription'] = 'Aqu&iacute; se gestionan los grupos.';
$lang['admin']['groupassignments'] = 'Asignaci&oacute;n a Grupos';
$lang['admin']['groupassignmentdescription'] = 'Aqu&iacute; se asignan usuarios a grupos.';
$lang['admin']['groupperms'] = 'Permisos de Grupos';
$lang['admin']['grouppermsdescription'] = 'Asignar permisos y niveles de acceso para grupos';
$lang['admin']['pagesdescription'] = 'Aqu&iacute; es donde se a&ntilde;aden y editan p&aacute;ginas y otros contenidos';
$lang['admin']['htmlblobdescription'] = 'Los Bloques son trocitos de contenido que puedes instertar en tus p&aacute;ginas o plantillas.';
$lang['admin']['templates'] = 'Plantillas';
$lang['admin']['templatesdescription'] = 'Aqu&iacute; es donde a&ntilde;adimos y editamos plantillas. las plantillas definen el aspecto del sitio.';
$lang['admin']['stylesheets'] = 'Hojas de Estilo';
$lang['admin']['stylesheetsdescription'] = 'Es una forma avanzada de manejar las Hojas de Estilo en cascada (CSS) de forma independiente de las plantillas.';
$lang['admin']['filemanagerdescription'] = 'Subir y gestionar archivos.';
$lang['admin']['imagemanagerdescription'] = 'Subir/editar y borrar im&aacute;genes.';
$lang['admin']['moduledescription'] = 'Los M&oacute;dulos Extienden CMS Made Simple con todo tipo de funcionalidades personalizadas.';
$lang['admin']['tagdescription'] = 'Los Tags son peque&ntilde;as funcionalidades que se pueden insertar en el contenido y/o las plantillas.';
$lang['admin']['usertagdescription'] = 'Tags que puedes crear y modificar tu mismo para realizar tareas espec&iacute;ficas.';
$lang['admin']['installdirwarning'] = '<em><strong>Aviso:</strong></em> el directorio Install todav&iacute;a existe. Debes borrarlo completamente.';
$lang['admin']['subitems'] = 'Subelementos';
$lang['admin']['extensionsdescription'] = 'M&oacute;dulos, tags, y otras cosas.';
$lang['admin']['usersgroupsdescription'] = 'Elementos relacionados con Usuarios y Grupos.';
$lang['admin']['layoutdescription'] = 'Opciones de dise&ntilde;o del Sitio.';
$lang['admin']['admindescription'] = 'Funciones de administraci&oacute;n del Sitio.';
$lang['admin']['contentdescription'] = 'Aqu&iacute; es donde a&ntilde;adimos y editamos contenido.';
$lang['admin']['enablecustom404'] = 'Habilitar Mensaje 400 Personalizado.';
$lang['admin']['enablesitedown'] = 'Habilitar Mensaje de Sitio Desactivado.';
$lang['admin']['enablewysiwyg'] = 'Habilitar el editor WYSIWYG en el mensaje de &quot;Sitio Desactivado&quot;';
$lang['admin']['bookmarks'] = 'Atajos';
$lang['admin']['user_created'] = 'Del Usuario';
$lang['admin']['forums'] = 'Foros';
$lang['admin']['wiki'] = 'Wiki ';
$lang['admin']['irc'] = 'IRC ';
$lang['admin']['team'] = 'Equipo';
$lang['admin']['documentation'] = 'Documentaci&oacute;n';
$lang['admin']['module_help'] = 'Ayuda M&oacute;dulo';
$lang['admin']['managebookmarks'] = 'Gestionar Atajos';
$lang['admin']['editbookmark'] = 'Editar Atajos';
$lang['admin']['addbookmark'] = 'A&ntilde;adir Atajos';
$lang['admin']['recentpages'] = 'P&aacute;ginas Recientes';
$lang['admin']['groupname'] = 'Nombre de Grupo';
$lang['admin']['selectgroup'] = 'Seleccionar Grupo';
$lang['admin']['updateperm'] = 'Actualizar permisos';
$lang['admin']['admincallout'] = 'Atajos de Administraci&oacute;n';
$lang['admin']['showbookmarks'] = 'Mostrar Atajos de Admin';
$lang['admin']['hide_help_links'] = 'Ocultar ayudas';
$lang['admin']['hide_help_links_help'] = 'Activa esto para no mostrar los enlaces de ayuda wiki y m&oacute;dulo en las cabeceras.';
$lang['admin']['showrecent'] = 'Mostrar P&aacute;ginas Usadas recientemente';
$lang['admin']['attachtotemplate'] = 'Adjuntar Hoja de Estilo a Plantilla';
$lang['admin']['attachstylesheets'] = 'Adjuntar Hoja de Estilo';
$lang['admin']['indent'] = 'Indentar Listado para mejorar el Arbol';
$lang['admin']['adminindent'] = 'Mostrar Contenido';
$lang['admin']['contract'] = 'Agrupar secci&oacute;n';
$lang['admin']['expand'] = 'Expandir Secci&oacute;n';
$lang['admin']['expandall'] = 'Expandir Todas las Secciones';
$lang['admin']['contractall'] = 'Agrupar Todas las Secciones';
$lang['admin']['menu_bookmarks'] = '[+] ';
$lang['admin']['globalconfig'] = 'Configuraci&oacute;n General';
$lang['admin']['adminpaging'] = 'N&uacute;mero de Elementos por p&aacute;gina a mostrar en el Listado';
$lang['admin']['nopaging'] = 'Mostrar Todos los Elementos';
$lang['admin']['myprefs'] = 'Mis Preferencias';
$lang['admin']['myprefsdescription'] = 'Aqu&iacute; es donde puedes personalizar la administraci&oacute;n para que funcione a tu manera.';
$lang['admin']['myaccount'] = 'Mi Cuenta';
$lang['admin']['myaccountdescription'] = 'Aqu&iacute; es donde puedes actualizar los datos de tu cuenta personal.';
$lang['admin']['adminprefs'] = 'Preferencias del Usuario';
$lang['admin']['adminprefsdescription'] = 'Aqu&iacute; es donde configuras tus preferencias para la administraci&oacute;n del sitio.';
$lang['admin']['managebookmarksdescription'] = 'Aqu&iacute; es donde administras tus atajos de administraci&oacute;n.';
$lang['admin']['options'] = 'Opciones';
$lang['admin']['langparam'] = 'El Par&aacute;metro se usa para especificar que idioma usar en el frontend. No todos los m&oacute;dulos lo soportan o necesitan.';
$lang['admin']['parameters'] = 'Par&aacute;metros';
$lang['admin']['mediatype'] = 'Tipo de Medio (Media Type)';
$lang['admin']['media_query'] = 'Consulta de Medios (Media Query)';
$lang['admin']['media_query_description'] = '<strong>Nota:</strong> Cuando se usen Media Query, la selecci&oacute;n de Tipo de Medio ser&aacute; ignorada.<br /> Use cualquier expresi&oacute;n v&aacute;lida como se reomiendia en  <a href="http://www.w3.org/TR/css3-mediaqueries/" rel="external" title="W3C">W3C</a>.
';
$lang['admin']['mediatype_'] = 'Nada : afectara a todo ';
$lang['admin']['mediatype_all'] = 'todo : para todos los dispositivos.';
$lang['admin']['mediatype_aural'] = 'aural : para sintetizadores de voz.';
$lang['admin']['mediatype_braille'] = 'braille : para dispositivos tactiles en braille.';
$lang['admin']['mediatype_embossed'] = 'embossed : para impresoras en braille.';
$lang['admin']['mediatype_handheld'] = 'handheld : para dispositivos portatiles';
$lang['admin']['mediatype_print'] = 'print : Para material opaco y para documentos visualizados por pantalla en modo de previsualizacion.';
$lang['admin']['mediatype_projection'] = 'projection : Para presentaciones proyactadas, por ejemplo proyactores o impresion a transparencias.';
$lang['admin']['mediatype_screen'] = 'screen : Principalmente para monitores en color.';
$lang['admin']['mediatype_tty'] = 'tty : Para publicaciones que usan un paso de caracteres fijo, como teletipos y terminales.';
$lang['admin']['mediatype_speech'] = 'Habla: Destinado a sintetizadores de habla.';
$lang['admin']['mediatype_tv'] = 'tv : Para dispositivos de television.';
$lang['admin']['assignmentchanged'] = 'Asignaciones de Grupos actualizadas.';
$lang['admin']['stylesheetexists'] = 'La Hoja de Estilo existe.';
$lang['admin']['errorcopyingstylesheet'] = 'Error al Copiar Hoja de Estilo';
$lang['admin']['copystylesheet'] = 'Copiar Hoja de Estilo';
$lang['admin']['newstylesheetname'] = 'Nuevo Nombre de Hoja de Estilo';
$lang['admin']['target'] = 'Destino';
$lang['admin']['xml'] = 'XML ';
$lang['admin']['xmlmodulerepository'] = 'URL de ModuleRepository soap server';
$lang['admin']['metadata'] = 'Metadatos';
$lang['admin']['globalmetadata'] = 'Metadatos Generales';
$lang['admin']['titleattribute'] = 'T&iacute;tulo del Atributo';
$lang['admin']['tabindex'] = 'Indice';
$lang['admin']['accesskey'] = 'Clave de Acceso';
$lang['admin']['sitedownwarning'] = '<strong>Aviso:</strong> Su sitio muestra actualmente un mensaje de &quot;Sitio Desactivado&quot;.  Borre el archivo %s para resolverlo.';
$lang['admin']['deletecontent'] = 'Borrar Contenido';
$lang['admin']['deletepages'] = '&iquest;Borrar estas p&aacute;ginas?';
$lang['admin']['selectall'] = 'Seleccionar Todo';
$lang['admin']['selecteditems'] = 'Elementos Seleccionados';
$lang['admin']['inactive'] = 'Inactivo';
$lang['admin']['deletetemplates'] = 'Borrar Plantillas';
$lang['admin']['templatestodelete'] = 'Se borraran estas plantillas';
$lang['admin']['wontdeletetemplateinuse'] = 'Estas plantillas estan en uso y no se borraran';
$lang['admin']['deletetemplate'] = 'Borrar Hoja de Estilo';
$lang['admin']['stylesheetstodelete'] = 'Se borrar&aacute;n estas hojas de estilo';
$lang['admin']['sitename'] = 'Nombre del Sitio';
$lang['admin']['goto'] = 'Regresar a: ';
$lang['admin']['siteadmin'] = 'Administraci&oacute;n';
$lang['admin']['images'] = 'Gestor de Imagenes';
$lang['admin']['blobs'] = 'Bloques';
$lang['admin']['groupmembers'] = 'Asignaciones a Grupos';
$lang['admin']['troubleshooting'] = '(Problemas)';
$lang['admin']['event_desc_loginpost'] = 'Se env&iacute;a al entrar un usuario en administraci&oacute;n';
$lang['admin']['event_desc_logoutpost'] = 'Se env&iacute;a al salir un usuario de administraci&oacute;n';
$lang['admin']['event_desc_adduserpre'] = 'Se env&iacute;a antes de crear un nuevo usuario';
$lang['admin']['event_desc_adduserpost'] = 'Se env&iacute;a al crear un nuevo usuario';
$lang['admin']['event_desc_edituserpre'] = 'Se env&iacute;a antes de modificar un usuario';
$lang['admin']['event_desc_edituserpost'] = 'Se env&iacute;a al modificar un usuario';
$lang['admin']['event_desc_deleteuserpre'] = 'Se env&iacute;a antes de eliminar un usuario';
$lang['admin']['event_desc_deleteuserpost'] = 'Se env&iacute;a al eliminar un usuario';
$lang['admin']['event_desc_addgrouppre'] = 'Se env&iacute;a antes de crear un nuevo grupo';
$lang['admin']['event_desc_addgrouppost'] = 'Se env&iacute;a al crear un nuevo grupo';
$lang['admin']['event_desc_changegroupassignpre'] = 'Se env&iacute;a antes de grabar la asignaci&oacute;n a grupo';
$lang['admin']['event_desc_changegroupassignpost'] = 'Se env&iacute;a despu&eacute;s de grabar la asignaci&oacute;n a grupo';
$lang['admin']['event_desc_editgrouppre'] = 'Se env&iacute;a antes de modificar un grupo';
$lang['admin']['event_desc_editgrouppost'] = 'Se env&iacute;a al modificar un grupo';
$lang['admin']['event_desc_deletegrouppre'] = 'Se env&iacute;a antes de eliminar un grupo';
$lang['admin']['event_desc_deletegrouppost'] = 'Se env&iacute;a al eliminar un grupo';
$lang['admin']['event_desc_addstylesheetpre'] = 'Se env&iacute;a antes de crear una hoja de estilo';
$lang['admin']['event_desc_addstylesheetpost'] = 'Se env&iacute;a al crear una hoja de estilo';
$lang['admin']['event_desc_editstylesheetpre'] = 'Se env&iacute;a antes de modificar una hoja de estilo';
$lang['admin']['event_desc_editstylesheetpost'] = 'Se env&iacute;a al modificar una hoja de estilo';
$lang['admin']['event_desc_deletestylesheetpre'] = 'Se env&iacute;a antes de eliminar una hoja de estilo';
$lang['admin']['event_desc_deletestylesheetpost'] = 'Se env&iacute;a al eliminar una hoja de estilo';
$lang['admin']['event_desc_addtemplatepre'] = 'Se env&iacute;a antes de crear una plantilla';
$lang['admin']['event_desc_addtemplatepost'] = 'Se env&iacute;a al crear una plantilla';
$lang['admin']['event_desc_edittemplatepre'] = 'Se env&iacute;a antes de modificar una plantilla';
$lang['admin']['event_desc_edittemplatepost'] = 'Se env&iacute;a al modificar una plantilla';
$lang['admin']['event_desc_deletetemplatepre'] = 'Se env&iacute;a antes de eliminar una plantilla';
$lang['admin']['event_desc_deletetemplatepost'] = 'Se env&iacute;a al eliminar una plantilla';
$lang['admin']['event_desc_templateprecompile'] = 'Se env&iacute;a antes de que smarty procese una plantilla';
$lang['admin']['event_desc_templatepostcompile'] = 'Se env&iacute;a cuando smarty procesa una plantilla';
$lang['admin']['event_desc_addglobalcontentpre'] = 'Se env&iacute;a antes crear un bloque';
$lang['admin']['event_desc_addglobalcontentpost'] = 'Se env&iacute;a al crear un bloque';
$lang['admin']['event_desc_editglobalcontentpre'] = 'Se env&iacute;a antes de modificar un bloque';
$lang['admin']['event_desc_editglobalcontentpost'] = 'Se env&iacute;a al modificar un bloque';
$lang['admin']['event_desc_deleteglobalcontentpre'] = 'Se env&iacute;a antes de eliminar un bloque';
$lang['admin']['event_desc_deleteglobalcontentpost'] = 'Se env&iacute;a al eliminar un bloque';
$lang['admin']['event_desc_globalcontentprecompile'] = 'Se env&iacute;a antes de que smarty procese un bloque';
$lang['admin']['event_desc_globalcontentpostcompile'] = 'Se env&iacute;a cuando smarty procesa un bloque';
$lang['admin']['event_desc_contenteditpre'] = 'Se env&iacute;a antes de modificar contenido';
$lang['admin']['event_desc_contenteditpost'] = 'Se env&iacute;a al modificar contenido';
$lang['admin']['event_desc_contentdeletepre'] = 'Se env&iacute;a antes de eliminar contenido';
$lang['admin']['event_desc_contentdeletepost'] = 'Se env&iacute;a al eliminar contenido';
$lang['admin']['event_desc_contentstylesheet'] = 'Se env&iacute;a antes de enviar la hoja de estilo al navegador';
$lang['admin']['event_desc_contentprecompile'] = 'Se env&iacute;a antes de que smarty procese contenido';
$lang['admin']['event_desc_contentpostcompile'] = 'Se env&iacute;a cuando smarty ha procesado contenido';
$lang['admin']['event_desc_contentpostrender'] = 'Se env&iacute;a antes de enviar HTML combinado al navegador';
$lang['admin']['event_desc_smartyprecompile'] = 'Se env&iacute;a antes de cualquier contenido destinado a smatry se procese';
$lang['admin']['event_desc_smartypostcompile'] = 'Se env&iacute;a al procesar cualquier contenido destinado a smatry';
$lang['admin']['event_help_loginpost'] = '<p>Se env&iacute;a al entrar un usuario en administraci&oacute;n.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_logoutpost'] = '<p>Se env&iacute;a al salir un usuario de administraci&oacute;n.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_adduserpre'] = '<p>Se env&iacute;a antes de crear un nuevo usuario.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_adduserpost'] = '<p>Se env&iacute;a al crear un nuevo usuario.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_edituserpre'] = '<p>Se env&iacute;a antes de modificar un usuario.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_edituserpost'] = '<p>Se env&iacute;a al modificar un usuario.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_deleteuserpre'] = '<p>Se env&iacute;a antes de eliminar un usuario.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_deleteuserpost'] = '<p>Se env&iacute;a al eliminar un usuario.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;user&#039; - Referencia al objeto usuario afectado.</li>
</ul>
';
$lang['admin']['event_help_addgrouppre'] = '<p>Se env&iacute;a antes de crear un nuevo grupo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;group&#039; - Referencia al objeto grupo afectado.</li>
</ul>
';
$lang['admin']['event_help_addgrouppost'] = '<p>Se env&iacute;a al crear un nuevo grupo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;group&#039; - Referencia al objeto grupo afectado.</li>
</ul>
';
$lang['admin']['event_help_changegroupassignpre'] = '<p>Sent before group assignments are saved.</p>
<h4>Parameters></h4>
<ul>
<li>&#039;group&#039; - Reference to the group object.</li>
<li>&#039;users&#039; - Array of references to user objects belonging to the group.</li>
';
$lang['admin']['event_help_changegroupassignpost'] = '<p>Sent after group assignments are saved.</p>
<h4>Parameters></h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
<li>&#039;users&#039; - Array of references to user objects now belonging to the affected group.</li>
';
$lang['admin']['event_help_editgrouppre'] = '<p>Se env&iacute;a antes de modificar un grupo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;group&#039; - Referencia al objeto grupo afectado.</li>
</ul>
';
$lang['admin']['event_help_editgrouppost'] = '<p>Se env&iacute;a al modificar un grupo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;group&#039; - Referencia al objeto grupo afectado.</li>
</ul>
';
$lang['admin']['event_help_deletegrouppre'] = '<p>Se env&iacute;a antes de eliminar un grupo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;group&#039; - Referencia al objeto grupo afectado.</li>
</ul>
';
$lang['admin']['event_help_deletegrouppost'] = '<p>Se env&iacute;a al eliminar un grupo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;group&#039; - Referencia al objeto grupo afectado.</li>
</ul>
';
$lang['admin']['event_help_addstylesheetpre'] = '<p>Se env&iacute;a antes de crear una hoja de estilo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;stylesheet&#039; - Referencia al objeto hoja de estilo afectado.</li>
</ul>
';
$lang['admin']['event_help_addstylesheetpost'] = '<p>Se env&iacute;a al crear una hoja de estilo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;stylesheet&#039; - Referencia al objeto hoja de estilo afectado.</li>
</ul>
';
$lang['admin']['event_help_editstylesheetpre'] = '<p>Se env&iacute;a antes de modificar una hoja de estilo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;stylesheet&#039; - Referencia al objeto hoja de estilo afectado.</li>
</ul>
';
$lang['admin']['event_help_editstylesheetpost'] = '<p>Se env&iacute;a al modificar una hoja de estilo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;stylesheet&#039; - Referencia al objeto hoja de estilo afectado.</li>
</ul>
';
$lang['admin']['event_help_deletestylesheetpre'] = '<p>Se env&iacute;a antes de eliminar una hoja de estilo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;stylesheet&#039; - Referencia al objeto hoja de estilo afectado.</li>
</ul>
';
$lang['admin']['event_help_deletestylesheetpost'] = '<p>Se env&iacute;a al eliminar una hoja de estilo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;stylesheet&#039; - Referencia al objeto hoja de estilo afectado.</li>
</ul>
';
$lang['admin']['event_help_addtemplatepre'] = '<p>Se env&iacute;a antes de crear una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_addtemplatepost'] = '<p>Se env&iacute;a al crear una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_edittemplatepre'] = '<p>Se env&iacute;a antes de modificar una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_edittemplatepost'] = '<p>Se env&iacute;a al modificar una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_deletetemplatepre'] = '<p>Se env&iacute;a antes de eliminar una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_deletetemplatepost'] = '<p>Se env&iacute;a al eliminar una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_templateprecompile'] = '<p>Se env&iacute;a antes de que smarty procese una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_templatepostcompile'] = '<p>Se env&iacute;a cuando smarty procesa una plantilla.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;template&#039; - Referencia al objeto plantilla afectado.</li>
</ul>
';
$lang['admin']['event_help_addglobalcontentpre'] = '<p>Se env&iacute;a antes crear un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_addglobalcontentpost'] = '<p>Se env&iacute;a al crear un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_editglobalcontentpre'] = '<p>Se env&iacute;a antes modificar un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_editglobalcontentpost'] = '<p>Se env&iacute;a al modificar un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_deleteglobalcontentpre'] = '<p>Se env&iacute;a antes eliminar un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_deleteglobalcontentpost'] = '<p>Se env&iacute;a al eliminar un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_globalcontentprecompile'] = '<p>Se env&iacute;a antes de que smarty procese un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_globalcontentpostcompile'] = '<p>Se env&iacute;a cuando smarty procesa un bloque.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;global_content&#039; - Referencia al objeto bloque afectado.</li>
</ul>
';
$lang['admin']['event_help_contenteditpre'] = '<p>Se env&iacute;a antes de modificar contenido.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;content&#039; - Referencia al objeto contenido afectado.</li>
</ul>
';
$lang['admin']['event_help_contenteditpost'] = '<p>Se env&iacute;a al modificar contenido.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;content&#039; - Referencia al objeto contenido afectado.</li>
</ul>
';
$lang['admin']['event_help_contentdeletepre'] = '<p>Se env&iacute;a antes de eliminar contenido.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;content&#039; - Referencia al objeto contenido afectado.</li>
</ul>
';
$lang['admin']['event_help_contentdeletepost'] = '<p>Se env&iacute;a al eliminar contenido.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;content&#039; - Referencia al objeto contenido afectado.</li>
</ul>
';
$lang['admin']['event_help_contentstylesheet'] = '<p>Se env&iacute;a antes de enviar la hoja de estilo al navegador.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>&#039;content&#039; - Referencia al objeto contenido afectado.</li>
</ul>
';
$lang['admin']['event_help_contentprecompile'] = '<p>Se env&iacute;a antes de que smarty procese contenido.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content text.</li>
</ul>
';
$lang['admin']['event_help_contentpostcompile'] = '<p>Se env&iacute;a cuando smarty ha procesado contenido.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content text.</li>
</ul>
';
$lang['admin']['event_help_contentpostrender'] = '<p>Se env&iacute;a antes de enviar HTML combinado al navegador.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the html text.</li>
</ul>
';
$lang['admin']['event_help_smartyprecompile'] = '<p>Se env&iacute;a antes de cualquier contenido destinado a smatry se procese.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected text.</li>
</ul>
';
$lang['admin']['event_help_smartypostcompile'] = '<p>Se env&iacute;a al procesar cualquier contenido destinado a smatry.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected text.</li>
</ul>
';
$lang['admin']['filterbymodule'] = 'Filtrar Por M&oacute;dulo';
$lang['admin']['showall'] = 'Mostrar Todo';
$lang['admin']['core'] = 'N&uacute;cleo (Core)';
$lang['admin']['defaultpagecontent'] = 'Contenido Por Defecto';
$lang['admin']['file_url'] = 'Enlace a archivo (en vez de la URL)';
$lang['admin']['no_file_url'] = 'Ninguno (Usar la URL de arriba)';
$lang['admin']['defaultparentpage'] = 'P&aacute;gina Raiz por defecto';
$lang['admin']['error_udt_name_whitespace'] = 'Error: El nombre de los Tags personalizados no pueden contener espacios';
$lang['admin']['warning_safe_mode'] = '<strong><em>AVISO:</strong> PHP Safe mode est&aacute; activado.  Esto provocar&aacute; problemas con archivos subidos via navegador, incluido im&aacute;genes, temas y m&oacute;dulos XML.  Te recomendamos contactar con el administrador del sitio para desactivar el safe mode.';
$lang['admin']['test'] = 'Prueba';
$lang['admin']['results'] = 'Resultados';
$lang['admin']['untested'] = 'Sin Probar';
$lang['admin']['unknown'] = 'Desconocido';
$lang['admin']['download'] = 'Descargar';
$lang['admin']['frontendwysiwygtouse'] = 'Wysiwyg del portal';
$lang['admin']['backendwysiwygtouse'] = 'Editor WYSIWYG por defecto (para nuevos usuarios)';
$lang['admin']['all_groups'] = 'Todos los Grupos';
$lang['admin']['error_type'] = 'Tipo de Error';
$lang['admin']['contenttype_errorpage'] = 'Pagina de Error';
$lang['admin']['errorpagealreadyinuse'] = 'C&oacute;digo de Error ya est&aacute; en uso.';
$lang['admin']['404description'] = 'Pagina no encontrada';
$lang['admin']['usernotfound'] = 'Usuario no encontrado';
$lang['admin']['passwordchange'] = 'Por favor, ingrese su clave';
$lang['admin']['recoveryemailsent'] = 'Se envi&oacute; un correo electr&oacute;nico a la direcci&oacute;n registrada. Por favor revisar correo para mas instrucciones.';
$lang['admin']['errorsendingemail'] = 'Error al enviar el correo electronico. Contacte a su administrador.';
$lang['admin']['passwordchangedlogin'] = 'Clave cambiada. Por favor ingrese con sus nuevas credenciales.';
$lang['admin']['nopasswordforrecovery'] = 'No hay direcci&oacute;n de email para este usuario. No se puede recuperar su clave. Por favor contacte a su administrador.';
$lang['admin']['lostpw'] = '&iquest;Clave olvidada?';
$lang['admin']['lostpwemailsubject'] = '[%s] recuperaci&oacute;n de clave';
$lang['admin']['lostpwemail'] = 'El motivo de este email es porque se ha realizado una petici&oacute;n de cambio de la contrase&ntilde;a (%s) asociada con esta cuenta de usuario (%s). Si quiere resetear la contrase&ntilde;a para esta cuenta haga clic en el enlace siguiente o p&eacute;guelo en el campo de direcci&oacute;n de su navegador favorito:
%s

Si piensa que es incorrecto o que se ha hecho por error, ignore este email y no se cambiar&aacute; nada.';
$lang['admin']['utma'] = '57867837.242160996.1328897234.1340503779.1340640944.19';
$lang['admin']['utmz'] = '57867837.1340387920.15.12.utmcsr=wiki.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmctr=cmsms gallery show comment|utmcct=/index.php';
$lang['admin']['utmc'] = '57867837';
?>
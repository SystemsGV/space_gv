<? 
if($_GET[idf]){
  $post = File::find($_GET[idf]); 
}
?>
<!--<section class="content">
  <div class="box box-primary">    
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>           
    <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype="multipart/form-data">    
    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
    <input type="hidden" name="act" value="<?=$_GET[act]?>">
    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">
                  <div class="box-body">
                   <div class="row form-group">
                      <div class="col-xs-12">                          
                        <input id="uploads" name="uploads" class="file" type="file" accept="image/*" data-title="<?=$post->txtfilesrc?$post->txtfilesrc:"imágen"?>" value="<?=$post->txtfilesrc?"image.php?src={$post->txtfilesrc}&w=600":"http://placehold.it/1000x300"?>" width="200px" height="100px">                        
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control input-sm" name="titulo" placeholder="Titulo" value="<?=$post->varfiletitulo?>" requerid>
                      </div>
                    </div>
                    <div class="row form-group">                      
                      <div class="col-xs-12">
                        <label>
                        <input type="checkbox" name="stado" class="minimal" value="1" <?if($post->intfilest){echo "checked";}?>/> Publico
                        </label> 
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <a href="?mod=<?=$_GET[mod]?>&page=index" class="btn btn-danger">Cancelar</a>
                  </div>
                </form>
  </div>
</section>
-->
<section class="content">
<div class="box box-primary">
    <form role="form" action="mod/<?=$_GET[mod]?>/proc.php" method="post" enctype="multipart/form-data">    
    <input type="hidden" name="mod" value="<?=$_GET[mod]?>">
    <input type="hidden" name="act" value="<?=$_GET[act]?>">
    <input type="hidden" name="idf" value="<?=$_GET[idf]?>">  
    <div class="box-header"><h3 class="box-title">Formulario</h3></div>
    <div class="box-body">          
    <div class="row form-group">
      <div class="col-xs-9">        
        <div class="img-container">
          <img src="" alt="Picture">
        </div>
      </div>
      <div class="col-xs-3" style="padding:0px">        
        <div class="docs-preview clearfix">
          <div class="img-preview preview-lg"></div>
          <!--<div class="img-preview preview-md"></div>
          <div class="img-preview preview-sm"></div>
          <div class="img-preview preview-xs"></div>-->
        </div>        
        <div class="docs-data">
          <div class="input-group">
            <label class="input-group-addon" for="dataX">X</label>
            <input class="form-control input-sm" id="dataX" type="text" placeholder="x">            
          </div>
          <div class="input-group">
            <label class="input-group-addon" for="dataY">Y</label>
            <input class="form-control input-sm" id="dataY" type="text" placeholder="y">            
          </div>
          <div class="input-group">
            <label class="input-group-addon" for="dataWidth">W</label>
            <input class="form-control input-sm" id="dataWidth" type="text" placeholder="width">            
          </div>
          <div class="input-group">
            <label class="input-group-addon" for="dataHeight">H</label>
            <input class="form-control input-sm" id="dataHeight" type="text" placeholder="height">            
          </div>
          <div class="input-group">
            <label class="input-group-addon" for="dataRotate">R</label>
            <input class="form-control input-sm" id="dataRotate" type="text" placeholder="rotate">            
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9 docs-buttons">
        <!-- <h3 class="page-header">Toolbar:</h3> -->
        <div class="col-md-4 docs-toggles">
        <div class="btn-group btn-group-justified" data-toggle="buttons">
          <label class="btn btn-primary active" data-method="setAspectRatio" data-option="1.7777777777777777" title="Set Aspect Ratio">
            <input class="sr-only" id="aspestRatio1" name="aspestRatio" value="1.7777777777777777" type="radio">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setAspectRatio&quot;, 16 / 9)">
              16:9
            </span>
          </label>
          <label class="btn btn-primary" data-method="setAspectRatio" data-option="1.3333333333333333" title="Set Aspect Ratio">
            <input class="sr-only" id="aspestRatio2" name="aspestRatio" value="1.3333333333333333" type="radio">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setAspectRatio&quot;, 4 / 3)">
              4:3
            </span>
          </label>
          <label class="btn btn-primary" data-method="setAspectRatio" data-option="1" title="Set Aspect Ratio">
            <input class="sr-only" id="aspestRatio3" name="aspestRatio" value="1" type="radio">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setAspectRatio&quot;, 1 / 1)">
              1:1
            </span>
          </label>
          <label class="btn btn-primary" data-method="setAspectRatio" data-option="0.6666666666666666" title="Set Aspect Ratio">
            <input class="sr-only" id="aspestRatio4" name="aspestRatio" value="0.6666666666666666" type="radio">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setAspectRatio&quot;, 2 / 3)">
              2:3
            </span>
          </label>
          <label class="btn btn-primary" data-method="setAspectRatio" data-option="NaN" title="Set Aspect Ratio">
            <input class="sr-only" id="aspestRatio5" name="aspestRatio" value="NaN" type="radio">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setAspectRatio&quot;, NaN)">
              Free
            </span>
          </label>
        </div>
        </div>
        <div class="btn-group">
          <button class="btn btn-primary" data-method="setDragMode" data-option="move" type="button" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
              <span class="icon icon-move"></span>
            </span>
          </button>
          <button class="btn btn-primary" data-method="setDragMode" data-option="crop" type="button" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
              <span class="icon icon-crop"></span>
            </span>
          </button>
          <button class="btn btn-primary" data-method="zoom" data-option="0.1" type="button" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
              <span class="icon icon-zoom-in"></span>
            </span>
          </button>
          <button class="btn btn-primary" data-method="zoom" data-option="-0.1" type="button" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
              <span class="icon icon-zoom-out"></span>
            </span>
          </button>
          <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="icon icon-rotate-left"></span>
            </span>
          </button>
          <button class="btn btn-primary" data-method="rotate" data-option="45" type="button" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
              <span class="icon icon-rotate-right"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">          
          <button class="btn btn-primary" data-method="reset" type="button" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;reset&quot;)">
              <span class="icon icon-refresh"></span>
            </span>
          </button>
          <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
            <input class="sr-only" id="inputImage" name="file" type="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
              <span class="icon icon-upload"></span>
            </span>
          </label>
        </div>

        <div class="btn-group btn-group-crop">
          <button class="btn btn-primary" data-method="getCroppedCanvas" type="button">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">
              Get Cropped Canvas
            </span>
          </button>
        </div>        
        <input class="form-control" id="putData" type="text" placeholder="Get data to here or set data with this value">
      </div>
    </div>
    </div>
    <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <a href="?mod=<?=$_GET[mod]?>&page=index" class="btn btn-danger">Cancelar</a>
                  </div>
    </form>
  </div>
  <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>
  </div>
  </section>
  <!-- Show the cropped image in modal -->
        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
              </div>
              <div class="modal-body"></div>              
            </div>
          </div>
        </div><!-- /.modal -->
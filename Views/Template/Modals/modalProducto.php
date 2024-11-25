

<!-- Modal -->
<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nou producte</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formProducte" name="formProducte" class="form-horizontal">
              <input type="hidden" id="idProducte" name="idProducte" value="">
              <p class="text-primary">Tots els camps son obligatoris.</p>

             
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtnomproducte">Nom del Joc</label>
                  <input type="text" class="form-control" id="txtnomproducte" name="txtnomproducte" required="">
                </div>
              </div>

              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="listcategory">Categoria</label>
                      <select class="form-control" id="listcategory" name="listcategory" required="">
                          <option value="">Selecciona una categoria</option>
                      </select>
                  </div>
              </div>



              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtdescripcion">Descripció</label>
                  <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtidioma">Idioma</label>
                  <input type="text" class="form-control" id="txtidioma" name="txtidioma" required="">
                </div>
              </div>
              

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txteditorial">Editorial</label>
                  <input type="text" class="form-control" id="txteditorial" name="txteditorial" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="numpreu">Preu en Euros</label>
                  <input type="number" class="form-control" id="numpreu" name="numpreu" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="numtempsDeJoc">Temps de Joc</label>
                  <input type="text" class="form-control" id="numtempsDeJoc" name="numtempsDeJoc" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="numjugadors">Número de jugadors/es</label>
                  <input type="number" class="form-control" id="numjugadors" name="numjugadors" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="numstock">Stock</label>
                  <input type="number" class="form-control" id="numstock" name="numstock" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtimatge">Imatge</label>
                  <input type="text" class="form-control" id="txtimatge" name="txtimatge" required="">
                </div>
              </div>



                <div class="form-group col-md-6">
                    <label for="listreserva">Es pot reservar?</label>
                    <select class="form-control " id="listreserva" name="listreserva" required >
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="listOulet">Oulet</label>
                    <select class="form-control " id="listOulet" name="listOulet" required >
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>

                
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="dateLlancament">Data de llançament?</label>
                  <input type="date" class="form-control" id="dateLlancament" name="dateLlancament" required="">
                </div>
              </div>
             
                <div class="form-group col-md-6">
                    <label for="listStatus">Estat</label>
                    <select class="form-control " id="listStatus" name="listStatus" required >
                        <option value="1">Actiu</option>
                        <option value="2">Inactiu</option>
                    </select>
                </div>

                <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Tancar</button>
              </div>
             </div>


            </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal per a visualitzar els detalls del producte en format de taula -->
<div class="modal fade" id="modalViewProducto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header header-primary">
          <h5 class="modal-title" id="titleModal2">Dades del jocs</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <table class="table table-bordered">
            <tbody>
              <tr>
                <td><strong>Nom del Joc</strong></td>
                <td  id="txtnomproducte2" name="txtnomproducte2" ></td>
              </tr>
              <tr>
                <td><strong>Descripció</strong></td>
                <td id="txtdescripcion2"></td>
              </tr>
              <tr>
                <td><strong>Preu</strong></td>
                <td id="numpreu2"></td>
              </tr>
              <tr>
                <td><strong>Stock</strong></td>
                <td id="numstock2"></td>
              </tr>
              <tr>
                <td><strong>Imatge</strong></td>
                <td id="txtimatge2"></td>
              </tr>
              <tr>
                <td><strong>Categoria</strong></td>
                <td id="listcategory2"></td>
              </tr>
              <tr>
                <td><strong>Idioma</strong></td>
                <td id="txtidioma2"></td>
              </tr>
              <tr>
                <td><strong>Editorial</strong></td>
                <td id="txteditorial2"></td>
              </tr>
              <tr>
                <td><strong>Data de llançament</strong></td>
                <td id="dateLlancament2"></td>
              </tr>
              <tr>
                <td><strong>Temps de Joc</strong></td>
                <td id="numtempsDeJoc2"></td>
              </tr>
              <tr>
                <td><strong>Jugadors</strong></td>
                <td id="numjugadors2"></td>
              </tr>

              <tr>
                <td><strong>Es pot reservar?</strong></td>
                <td id="listreserva2"></td>
              </tr>
              <tr>
                <td><strong>Oulet</strong></td>
                <td id="listOulet2"></td>
              </tr>
              <tr>
                <td><strong>Estat</strong></td>
                <td id="listStatus2"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
            <i class="fa fa-fw fa-lg fa-times-circle"></i> Tancar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


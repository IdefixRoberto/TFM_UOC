<div class="modal fade  modalPermisos" id="modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">

    
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title h4" >Permisos dels Rols dels usuaris</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="col-md-12">
          <div class="tile">

                <form action="" id="formPermisos" name="formPermisos">  
                  <!-- hem de capturar el idrol dels permisos que volem donar-->
                  <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required ="">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                                <tr>

                                  <th>Mòdul</th>
                                  <th>Llegir</th>
                                  <th>Escriure</th>
                                  <th>Actualitzar</th>
                                  <th>Eliminar</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                
                                $no = 1;

                                //Ara el que fem es accedir al subarray de modulos que es permisos
                                $modulos = $data['modulos'];
                                //faig un bucle for normal per  que recorrega tot el array
                                for($i=0; $i < count($modulos); $i++)
                                {
                                  //Ara li establim valors
                                  $permisos = $modulos[$i]['permisos'];

                                  //el que fa checked "" es que estiga activat el ckeckbok
                                  $rCheck = $permisos['r'] == 1 ? " checked " : "";
                                  $wCheck = $permisos['w'] == 1 ? " checked " : "";
                                  $uCheck = $permisos['u'] == 1 ? " checked " : "";
                                  $dCheck = $permisos['d'] == 1 ? " checked " : "";

                                  $idmod = $modulos[$i]['idmodulo'];
                                
                                ?>
                          <tr>
                            <?php $no; ?>
                            <input type ="hidden" name = "modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                            <td>
                             <?= $modulos[$i]['titulo']; ?>
                            </td>
                            <td>
                              <div class="toggle-flip">
                                <label>
                                  <input type="checkbox"  name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>> 
                                  <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="toggle-flip">
                                <label>
                                  <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?> >
                                  <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="toggle-flip">
                                <label>
                                  <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?> > 
                                  <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="toggle-flip">
                                <label>
                                  <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?> >  
                                  <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                  </span>
                                </label>
                              </div>
                            </td>



                          </tr>
                                <?php

                                //Per a que vaja incrementant-se incorpore aquest no++ 
                              $no++;
                              } 
                              
                              
                              
                              
                                ?>
                              
                              </tbody>
                            </table>
                          </div>
                          <div>
                          <div class="text-center">
                                      <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i> Guardar</button>
                                      <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt" aria-hidden="true"></i> Eixir </button>
                                  </div>

                          </div>
                          </div>
                    </form>
                </div>
          </div>
</div>

</div> 
</div>

     

</div>

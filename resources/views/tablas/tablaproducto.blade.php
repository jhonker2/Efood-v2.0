<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Iva</th>
                                        <th>Cantidad</th>
                                        <th>Stock Min.</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Iva</th>
                                        <th>Cantidad</th>
                                        <th>Stock Min.</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($producto as $p)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->descripcion}}</td>
                                        <td>{{$u->precio}}</td>
                                        <td>{{$u->maneja_iva}}</td>
                                        <td>{{$u->cantidad}}</td>
                                        <td>{{$u->stock_minimo}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
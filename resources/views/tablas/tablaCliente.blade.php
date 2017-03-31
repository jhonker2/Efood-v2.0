<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>CODIGO</th>
                                        <th>CEDULA</th>
                                        <th>NOMBRES</th>
                                        <th>CORREO</th>
                                        <th>APELLIDOS</th>
                                        <th>DIRECCION</th>
                                        <th>TE LEFONO</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>CODIGO</th>
                                        <th>CEDULA</th>
                                        <th>NOMBRES</th>
                                        <th>CORREO</th>
                                        <th>APELLIDOS</th>
                                        <th>DIRECCION</th>
                                        <th>TE LEFONO</th>
                                        <th>ACCION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($clientes as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->cedula}}</td>
                                        <td>{{$client->nombres}}</td>
                                        <td>{{$client->correo}}</td>
                                        <td>{{$client->apellidos}}</td>
                                        <td>{{$client->direccion}}</td>
                                        <td>{{$client->telefono}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
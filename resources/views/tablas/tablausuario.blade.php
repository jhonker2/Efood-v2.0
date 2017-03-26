<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Acciòn</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Acciòn</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($user as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->tipo_usuario}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
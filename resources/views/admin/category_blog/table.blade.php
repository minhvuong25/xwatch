<div class="form-group col-sm-5">
    <div class="table-responsive">
        <table class="table" id="menus-table">
            <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Tên</th>
                <th class="text-center">Hành động</th>
            </tr>
            </thead>
                <tbody>
                    @php
                        $index = 1; 
                    @endphp
                        <?php
                            $cat_tree = array_combine(array_column($cat_tree, 'id'), $cat_tree);
                            ?>
                            @foreach($cat_tree as $key => $val)
                            <?php
                            if (empty($val["parent_path"])) {
                                $url = url('/' . $val['slug']);
                            } else {
                                $parents = explode("/", $val["parent_path"]);
                                $url = '';
                                foreach ($parents as $parent) {
                                    $url .= '/' . $cat_tree[$parent]['slug'];
                                }

                                $url .= '/' . $val['slug'];
                            }

                            ?>
                            <tr>
                                <td class="text-center">{{ $index }}</td>
                                <td>
                                    @if($val["level"] == 1){{"----"}}@endif
                                    @if($val["level"] == 2){{"------"}}@endif
                                    <a href="{{ route('categoryBlog.edit', $val['id']) }}" class='btn btn-default btn-xs'>
                                        {{$val["title"]}} 
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('categoryBlog.edit', $val['id']) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a> 
                                </td>
                            </tr>
                    @php
                        $index++; 
                    @endphp
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Tên</th>
            <th>Hiển thị Home</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($categories as $category)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ $category->title }}</td>
                {{-- <td>
                    @if($category->status == -1)
                        <label class="label btn-danger">Deactive</label>
                    @endif
                    @if($category->status == 1)
                        <label class="label btn-success">Active</label>
                    @endif
                </td> --}}
                <td class="text-center">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="radio"  name="fav_language" onclick='UpdateMain({{$category->id}})'  id="customSwitch3" {{ $category->main == 1 ? ' checked ' : '' }}>
                  </div>
                </td>
                <td>
                    {!! Form::open(['route' => ['categoryBlog.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ url('danh-muc/' . $category->slug . '.html') }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('categoryBlog.edit', [$category->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>

            </tr>
            @php
                $index++; 
            @endphp
        @endforeach
        </tbody>
    </table>
</div>

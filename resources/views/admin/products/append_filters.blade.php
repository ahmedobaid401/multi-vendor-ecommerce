                 
                       @foreach($filters_available as $filter)
                       <select style="height:200px;"   class="form-control"  name="filters[{{$filter['filter_column']}}][]" multiple="">
                          <optgroup label="{{$filter['filter_name']}}">{{$filter['filter_name']}}</optgroup>
                                    @foreach($filter['filter_values'] as $key=>$filter_value)
                                      <option value=" {{$filter_value['filter_value']}} ">&nbsp;&nbsp;&nbsp;>&nbsp;{{$filter_value['filter_value']}}</option>
                        
                                    @endforeach
                       </select>
                       @endforeach
                      
               
                       
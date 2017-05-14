  <a href="#" id="followers-count-{{$user->id}}" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_{{$user->id}}">
                    {{$user->followers->count() }} Follower(s)
                </a>

                <a href="javascript:void(0)" data-pg="{{$user->username}}" class="follow-user pull-right">

				<a type="button" class="btn btn-default" href="settings/{{$user->username}}" > Edit Profile </a>




				            <!-- Modal -->
              <div class="modal fade" id="followerModal_{{$user->username}}" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Followers</h4>
                    </div>
                    <div class="modal-body">
                      <p>hey
                        @forelse($user->followers as $follower)
                          <div>
                            <a href="/profile/{{ $user->where('id',$follower->follower_id)->value('username') }}">{{ $user->where('id',$follower->follower_id)->value('name') }}</a>
                          </div>
                        @empty
                          no followers
                        @endforelse
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                 
                </div>
              </div>
              <!--  END OF MODAL -->
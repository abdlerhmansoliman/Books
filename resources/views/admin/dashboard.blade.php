<x-dash-layout>
    <h1>
<!-- استخدام أيقونة من FontAwesome -->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Dashboard</h3>
          </div>
        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content text-sm">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
          <!--begin::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 1-->
            <div class="small-box text-bg-primary">
              <div class="inner">
                <h3>{{$userCount }}</h3>
                <p>{{__('messages.users')}}</p>
              </div>
              <svg
              class="small-box-icon"
              fill="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
            >
              <path
                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
              ></path>
            </svg>
              
              <a
                href="{{route('dashboard.users')}}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
                {{__('messages.more info')}} <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 1-->
          </div>
          <!--end::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 2-->
            <div class="small-box text-bg-success">
              <div class="inner">
                <h3>{{$bookCount}} </h3>
                <p> {{__('messages.books')}}</p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
              <path d="M20 2.49985V17.1757L10 20.0332L0 17.1757V3.33318C0 2.54152 0.3625 1.81402 0.995 1.33735C1.2025 1.18068 1.43083 1.07402 1.66667 0.989018V15.919L10 18.2999L18.3333 15.919V0.155684C18.5692 0.240684 18.7983 0.347351 19.005 0.504018C19.6375 0.980684 20 1.70818 20 2.49985ZM10.8333 2.80902V14.6949L10 14.9332L9.16667 14.6949V2.80902C9.16667 1.69902 8.42083 0.709851 7.29083 0.389851L5.9 0.0573508C4.59083 -0.255149 3.33333 0.738184 3.33333 2.08402V14.7615L10 16.6665L16.6667 14.7615V2.11235C16.6667 0.781518 15.4358 -0.208483 14.1358 0.0773508L12.6458 0.404851C11.5783 0.709851 10.8325 1.69902 10.8325 2.80902H10.8333Z"/>

              </svg>
      
                
              <a
                href="{{route('dashboard.books')}}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
              {{__('messages.more info')}} <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 2-->
          </div>
          <!--end::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 3-->
            <div class=" small-box text-bg-warning">
              <div class="inner text-white">
                <h3>{{$reviewsCount}} </h3>
                <p>{{__('messages.reviews')}} </p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
              <path d="M6 1H8V4H10.5L6 8.5M6 1H4V4H1.5L6 8.5" />
              <path d="M6 1H8V4H10.5L6 8.5L1.5 4H4V1H6Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>

                
              <a
                href="dashboard/reviews"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
              {{__('messages.more info')}} <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 3-->
          </div>
          <!--end::Col-->
          <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 4-->
            <div class="small-box text-bg-danger">
              <div class="inner">
                <h3>{{__('messages.request')}}</h3>
                <p>{{__('messages.reads')}} </p>
              </div>
              <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
              >
                <path
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>

              
              <a
                href="{{route('dashboard.request')}}"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
              >
              {{__('messages.more info')}}  <i class="bi bi-link-45deg"></i>
              </a>
            </div>
            <!--end::Small Box Widget 4-->
          </div>
          <!--end::Col-->
        </div>

        {{-- graph --}}
        {{-- <div class="row">
          <!-- Start col -->
          <div class="col-lg-7 connectedSortable">
            <div class="card mb-4">
              <div class="card-header"><h3 class="card-title">Sales Value</h3></div>
              <div class="card-body"><div id="revenue-chart"></div></div>
            </div>
            <!-- /.card -->
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary mb-4">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>
                <div class="card-tools">
                  <span title="3 New Messages" class="badge text-bg-primary"> 3 </span>
                  <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                  </button>
                  <button
                    type="button"
                    class="btn btn-tool"
                    title="Contacts"
                    data-lte-toggle="chat-pane"
                  >
                    <i class="bi bi-chat-text-fill"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the start -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-start"> Alexander Pierce </span>
                      <span class="direct-chat-timestamp float-end"> 23 Jan 2:00 pm </span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img
                      class="direct-chat-img"
                      src="../../dist/assets/img/user1-128x128.jpg"
                      alt="message user image"
                    />
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <!-- Message to the end -->
                  <div class="direct-chat-msg end">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-end"> Sarah Bullock </span>
                      <span class="direct-chat-timestamp float-start"> 23 Jan 2:05 pm </span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img
                      class="direct-chat-img"
                      src="../../dist/assets/img/user3-128x128.jpg"
                      alt="message user image"
                    />
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">You better believe it!</div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <!-- Message. Default to the start -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-start"> Alexander Pierce </span>
                      <span class="direct-chat-timestamp float-end"> 23 Jan 5:37 pm </span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img
                      class="direct-chat-img"
                      src="../../dist/assets/img/user1-128x128.jpg"
                      alt="message user image"
                    />
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <!-- Message to the end -->
                  <div class="direct-chat-msg end">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-end"> Sarah Bullock </span>
                      <span class="direct-chat-timestamp float-start"> 23 Jan 6:10 pm </span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img
                      class="direct-chat-img"
                      src="../../dist/assets/img/user3-128x128.jpg"
                      alt="message user image"
                    />
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">I would love to.</div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                </div>
                <!-- /.direct-chat-messages-->
                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img
                          class="contacts-list-img"
                          src="../../dist/assets/img/user1-128x128.jpg"
                          alt="User Avatar"
                        />
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-end"> 2/28/2023 </small>
                          </span>
                          <span class="contacts-list-msg"> How have you been? I was... </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img
                          class="contacts-list-img"
                          src="../../dist/assets/img/user7-128x128.jpg"
                          alt="User Avatar"
                        />
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-end"> 2/23/2023 </small>
                          </span>
                          <span class="contacts-list-msg"> I will be waiting for... </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img
                          class="contacts-list-img"
                          src="../../dist/assets/img/user3-128x128.jpg"
                          alt="User Avatar"
                        />
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-end"> 2/20/2023 </small>
                          </span>
                          <span class="contacts-list-msg"> I'll call you back at... </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img
                          class="contacts-list-img"
                          src="../../dist/assets/img/user5-128x128.jpg"
                          alt="User Avatar"
                        />
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-end"> 2/10/2023 </small>
                          </span>
                          <span class="contacts-list-msg"> Where is your new... </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img
                          class="contacts-list-img"
                          src="../../dist/assets/img/user6-128x128.jpg"
                          alt="User Avatar"
                        />
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-end"> 1/27/2023 </small>
                          </span>
                          <span class="contacts-list-msg"> Can I take a look at... </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img
                          class="contacts-list-img"
                          src="../../dist/assets/img/user8-128x128.jpg"
                          alt="User Avatar"
                        />
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-end"> 1/4/2023 </small>
                          </span>
                          <span class="contacts-list-msg"> Never mind I found... </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input
                      type="text"
                      name="message"
                      placeholder="Type Message ..."
                      class="form-control"
                    />
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.direct-chat -->
          </div>
          <!-- /.Start col -->
          <!-- Start col -->
          <div class="col-lg-5 connectedSortable">
            <div class="card text-white bg-primary bg-gradient border-primary mb-4">
              <div class="card-header border-0">
                <h3 class="card-title">Sales Value</h3>
                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-primary btn-sm"
                    data-lte-toggle="card-collapse"
                  >
                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                  </button>
                </div>
              </div>
              <div class="card-body"><div id="world-map" style="height: 220px"></div></div>
              <div class="card-footer border-0">
                <!--begin::Row-->
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1" class="text-dark"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-2" class="text-dark"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-3" class="text-dark"></div>
                    <div class="text-white">Sales</div>
                  </div>
                </div>
                <!--end::Row-->
              </div>
            </div>
          </div>
          <!-- /.Start col -->
        </div> --}}

        <!-- /.row (main row) -->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
  </main>
</x-dash-layout>
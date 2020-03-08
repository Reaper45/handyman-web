import React from 'react';

export default function Job() {
  return (
      <a
          href="#"
          className="px-4 py-4 sm:px-5 flex hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out"
      >
          <div className="flex-1 flex">
              <div className="mr-4 hidden xs:block md:block">
                  <img
                      class="border border-gray-400 rounded-md h-10 w-10"
                      src="img/logo.png"
                      alt=""
                  />
              </div>
              <div className="items-center flex-1 max-w-lg">
                  <div className="text-sm leading-5 font-medium text-indigo-600 truncate">
                      <b className="ml-1">Fix leaking sink</b>
                      <span className="ml-1 text-gray-500">
                          for Joram Mwashighadi
                      </span>
                  </div>
                  <div className="sm:flex flex-1 max-w-xl truncate">
                      <div className="mr-6 flex items-center text-sm leading-5 text-gray-500">
                          <div class="flex items-center text-sm leading-5">
                              <svg
                                  class="flex-shrink-0 mr-3 h-5 w-5 text-gray-400"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                              >
                                  <path
                                      fill-rule="evenodd"
                                      d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                      clip-rule="evenodd"
                                  />
                                  <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                              </svg>
                              Plumbing
                          </div>
                          <div class="flex ml-3 items-center text-sm leading-5">
                              |
                              <svg
                                  class="ml-3 flex-shrink-0 h-5 w-5 text-gray-400"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                              >
                                  <path
                                      fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"
                                  />
                              </svg>
                              <em className="ml-3 hidden xs:inline-flex md:inline-flex">
                                  Posted Today
                              </em>
                          </div>
                          <span className="inline-flex ml-3 px-2 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Complete
                          </span>
                      </div>
                  </div>
              </div>
              <div className="items-center flex-shrink hidden sm:flex md:flex lg:flex ">
                  <div className="mr-2">
                      <img
                          class="h-10 w-10 rounded-full"
                          src="https://res.cloudinary.com/joram/image/upload/w_60,h_60/v1583533718/20180425_133816.jpg"
                          alt=""
                      />
                  </div>
                  <div className="text-sm leading-5 font-medium text-gray-700 truncate">
                      <b className="ml-1">Joram Mwashighadi</b>
                      <div className="flex items-center text-sm leading-5 text-gray-500">
                          <svg
                              className="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                          >
                              <path
                                  fill-rule="evenodd"
                                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                  clip-rule="evenodd"
                              ></path>
                          </svg>
                          Remote
                      </div>
                  </div>
              </div>
          </div>
          <div className="self-center	mr-2">
              <span class="py-1 text-sm font-semibold text-gray-700 ">
                  <svg
                      class="fill-current opacity-75 h-4 w-4"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                  >
                      <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                  </svg>
              </span>
          </div>
      </a>
  );
}

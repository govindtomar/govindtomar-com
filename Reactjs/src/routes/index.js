import { Navigate, useRoutes } from 'react-router-dom';

// layouts
import AppLayout from '../layouts/AppLayout';

// Routes
import Home from 'src/pages/Frontend/Home'
import ContactMe from 'src/pages/Frontend/ContactMe'
import MyWork from 'src/pages/Frontend/MyWork'
import MySkills from 'src/pages/Frontend/MySkills'
import NotFound from '../pages/Error/Page404';


// ----------------------------------------------------------------------

export default function Router() {

  const RouteIndexing = [
    {
      path: '/',
      element: <AppLayout />,
      children: [
        {
          path: '/',
          element: <Home />
        },
        {
          path: '/contact-me',
          element: <ContactMe />
        },
        {
          path: '/my-work',
          element: <MyWork />
        },
        {
          path: '/my-skills',
          element: <MySkills />
        },
      ]
    },
    {
      path: '*',
      element: <Navigate to="/404" replace />,
    },
    {
      path: '404', element:
        <NotFound />
    },
  ]


  return useRoutes(RouteIndexing);
}

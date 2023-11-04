import { Outlet } from 'react-router-dom';
import { styled } from '@mui/material/styles';
import Navbar from '../components/Navbar';
import { APPBAR_MOBILE, APPBAR_DESKTOP} from 'src/constants/theme'


const RootStyle = styled('div')(({ theme }) => ({
  display: 'flex',
  minHeight: '100%',
  overflow: 'hidden',
  [theme.breakpoints.up('lg')]: {
    // width: '1280px',
    // margin: 'auto',
    // position: 'relative'
  }
}));

const MainStyle = styled('div')(({ theme }) => ({
  flexGrow: 1,
  overflow: 'auto',
  minHeight: '100%',
  paddingTop: APPBAR_MOBILE,
  [theme.breakpoints.up('lg')]: {
    paddingTop: APPBAR_DESKTOP - APPBAR_DESKTOP,
    // paddingLeft: theme.spacing(2),
    // paddingRight: theme.spacing(2)
  }
}));

// ----------------------------------------------------------------------

export default function HomeLayout() {

  return (
    <RootStyle>
      <Navbar onOpenSidebar={() => true} />
      <MainStyle>
        <Outlet />
        {/* <Footer /> */}
      </MainStyle>      
    </RootStyle>
  );
}

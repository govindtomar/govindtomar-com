import PropTypes from 'prop-types';
// material
import { styled } from '@mui/material/styles';
import { Box, Stack, AppBar, Toolbar, Container } from '@mui/material';
import { APPBAR_MOBILE, APPBAR_DESKTOP, WEB_WIDTH} from 'src/constants/theme'
// components
import HeaderMenu from './HeaderMenu'
import Logo from 'src/components/Logo';

// ----------------------------------------------------------------------

const RootStyle = styled(AppBar)(({ theme }) => ({
  backdropFilter: 'blur(6px)',
  WebkitBackdropFilter: 'blur(6px)', // Fix on Mobile
  backgroundColor: theme.palette.common.white,
  boxShadow: theme.shadows[4],
  // [theme.breakpoints.up('lg')]: {
  //   width: `calc(100% - ${DRAWER_WIDTH + 1}px)`,
  // },
}));

const ContainerStyle = styled(Container)(({ theme }) => ({
  [theme.breakpoints.up('lg')]: {
    maxWidth: WEB_WIDTH,
    paddingLeft: 0,
    paddingRight: 0,
  },
}));


const ToolbarStyle = styled(Toolbar)(({ theme }) => ({
  minHeight: APPBAR_MOBILE,
  [theme.breakpoints.up('lg')]: {
    minHeight: APPBAR_DESKTOP,
    padding: theme.spacing(0, 2),
  },
}));

// ----------------------------------------------------------------------

Navbar.propTypes = {
  onOpenSidebar: PropTypes.func,
};

export default function Navbar({ onOpenSidebar }) {
  return (
    <RootStyle>
      <ContainerStyle>
      <ToolbarStyle>
        <Logo />

        <Box sx={{ flexGrow: 1 }} />

        <Stack direction="row" alignItems="center" spacing={{ xs: 0.5, sm: 1.5 }}>
          <HeaderMenu />
        </Stack>
      </ToolbarStyle>
      </ContainerStyle>
    </RootStyle>
  );
}
